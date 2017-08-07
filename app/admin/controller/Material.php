<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/8/1
 * Time: 20:36
 */

namespace app\admin\controller;


use houdunwang\core\Controller;
use houdunwang\view\View;
use system\model\Material as ModelMaterial;

class Material extends Common {
    public function lists(){
        $data=ModelMaterial::get();
        return View::make()->with(compact('data'));
    }
    public function store(){
        if(IS_POST){
            $info=$this->upload();
            $data=[
                'path'=>$info['path'],
                'create_time'=>time()
            ];
            ModelMaterial::save($data);
            return $this->success('上传成功')->setRedirect('?s=admin/material/lists');
        }
        return View::make();
    }
    private function upload(){
        $dir='upload/'.date('ymd');
        is_dir($dir) || mkdir($dir,0777,true);
        $storage = new \Upload\Storage\FileSystem($dir);
        $file = new \Upload\File('upload', $storage);

// Optionally you can rename the file on upload
        $new_filename = uniqid();
        $file->setName($new_filename);

// Validate file upload
// MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
        $file->addValidations(array(
            // Ensure file is of type "image/png"
            new \Upload\Validation\Mimetype(['image/png','image/gif','image/jpeg']),

            //You can also add multi mimetype validation
            //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

            // Ensure file is no larger than 5M (use "B", "K", M", or "G")
            new \Upload\Validation\Size('5M')
        ));

// Access data about the file that has been uploaded
        $data = array(
            'name'       => $file->getNameWithExtension(),
            'extension'  => $file->getExtension(),
            'mime'       => $file->getMimetype(),
            'size'       => $file->getSize(),
//            'md5'        => $file->getMd5(),
//            'dimensions' => $file->getDimensions(),
            'path' =>$dir.'/'.$file->getNameWithExtension()
        );
        $file->upload();
        return $data;
// Try to upload file
        // Try to upload file
        /*try {
            // Success!
            $file->upload();

            return $data;
        } catch ( \Exception $e ) {
            // Fail!
            $errors = $file->getErrors();
            foreach ( $errors as $e ) {
                throw new \Exception( $e );
            }*/
      //  }

    }
    public function remove(){
        $mid=$_GET['mid'];
        ModelMaterial::where("mid={$mid}")->destory();
        return $this->success('删除成功')->setRedirect('?s=admin/material/lists');
}
}