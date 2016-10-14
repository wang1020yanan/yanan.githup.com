<?php
namespace app\models;
use yii\base\Model;
class Upload extends Model {
    public $image;
    public function rules() {
        return [
            [['image'], 'image', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'image' => '图片',
        ];
    }



    public function uploadImage() {
        if ($this->validate()) {
            $dir='uploads/img/'.date("Ymd");
            if(!file_exists($dir))
                mkdir($dir);
            $str=$dir.'/'.date("YmdHis")."_".rand(111,999). '.' .$this->image->extension;
            if($this->image->saveAs($str)){
                return $str;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }
}
?>