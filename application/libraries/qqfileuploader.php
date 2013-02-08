<?php
/*
For more information see: 
https://github.com/valums/file-uploader
*/

class Qqfileuploader {
    private $allowedExtensions = array();
    //private $sizeLimit = 10485760;
    private $sizeLimit = 10485760;
    private $file;
	private $uploadName;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760){        
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
        $this->checkServerSettings();       

        if (isset($_GET['qqfile'])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false; 
        }
    }
    
	public function getUploadName(){
		if( isset( $this->uploadName ) )
			return $this->uploadName;
	}
	
	public function getName(){
		if ($this->file)
			return $this->file->getName();
	}
    
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        

        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
        }        
    }
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    public function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
        if (!is_writable($uploadDirectory)){
            return array('error' => "上传目录不可写");
        }
        //var_dump('111');
        if (!$this->file){
            return array('error' => '没有文件被上传');
        }
        //var_dump('222');
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => '文件是空的');
        }
        //var_dump('333');
        //var_dump($size);var_dump($this->sizeLimit);
        if ($size > $this->sizeLimit) {
            return array('error' => '文件太大了');
        }
        //var_dump('444');
        $pathinfo = pathinfo($this->file->getName());
        //$filename = $pathinfo['filename'];
        $filename = md5(uniqid());
        $ext = @$pathinfo['extension'];		// hide notices if extension is empty

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => '文件扩展名错误，应该是以下扩展名之一： '. $these . '.');
        }
        //var_dump('555');
        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                $filename = md5(uniqid());
            }
        }
        
		$this->uploadName = $filename . '.' . strtolower($ext);
        //var_dump('666');
        if ($this->file->save($uploadDirectory . $filename . '.' . strtolower($ext))){
            return true;
        } else {
            return false;
        }
        
    }    
}