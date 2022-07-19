<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Advertisement;
use App\Models\AdvertisementModel;

class AdvertisementController extends BaseController
{
    public function index()
    {
        $model = new AdvertisementModel();
        $data['getAdvertisement'] = $model->findAll();
        // echo "<pre>"; print_r($data['getAdvertisement']); die();

        if($this->request->getMethod() == 'post'){
            $info = $this->request->getVar();

            $imgFile = $this->request->getFile('image');
           
            // $newName = '';
            
            if ($imgFile->isValid() && ! $imgFile->hasMoved()) {
                $newName = $imgFile->getRandomName();
                $imgFile->move(ROOTPATH . 'public/admin/uploads', $newName);
            }

            $adInsert = [
                'type' => $info['type'], 
                'size' => $info['size'],
                'impression' => '303',
                'click' => '101',
                'redirect' => $info['redirect_url'],
                'image' => $newName,
                'script' => $info['script'],
                'status' => 1,
            ];
            
            $entity = new Advertisement;
            $entity->fill($adInsert);
         
            $model->save($entity);

            // echo "<pre>"; print_r($adInsert); die();
            // echo 'hello rafi'; die();
        }
        return view('admin/advertisement/advertisement', $data);
    }


    protected function advertisementImageInfoUpdate()
    {
        $img = $this->request->getFile('image');
        $newName = $img->getRandomName();
        $img->move(ROOTPATH . 'public/admin/uploads', $newName);

        return $newName;
    }

    protected function advertisementBasicInfoUpdate($id, $model, $imageUrl = null)
    {
        $info = $this->request->getVar();
        $adUpdate = [
            'type' => $info['type'], 
            'size' => $info['size'],
            'redirect' => $info['redirect_url'],
            'script' => $info['script'],
            'status' => 1,
        ];

        if ($imageUrl) {
            $adUpdate['image'] = $imageUrl;
        }
        // echo "<pre>"; print_r($adUpdate); die();

        $model->update($id, $adUpdate);
    }



    public function advertisementUpdate($id)
    {
        $model = new AdvertisementModel();
        $data['row'] = $model->where('id', $id)->first();
        // echo "<pre>"; print_r($data['row']); die();

        if($this->request->getMethod() == 'post'){

            $newFileName = $this->request->getFile('image');

            $advertisement = $model->find($id);
            // echo "<pre>"; print_r($advertisement); die();

            if ($newFileName->isValid()) {
                // echo 11; die();
                // if ($advertisement->image != '') {
                //     unlink('./admin/uploads/' . $advertisement->image);
                // }
                $imageUrl = $this->advertisementImageInfoUpdate();

                // echo "<pre>"; print_r($imageUrl); die();

                $this->advertisementBasicInfoUpdate($id, $model, $imageUrl);
                return redirect()->to(base_url('admin/advertisement'));
            } else {
                // echo 22; die();
                $this->advertisementBasicInfoUpdate($id, $model);
                return redirect()->to(base_url('admin/advertisement'));
            }
            
        }
        return view('admin/advertisement/advertisement-edit', $data);
    }

    public function adsManage($id)
    {
        // echo "<pre>"; print_r($id); die();

        $model = new AdvertisementModel();
        $getAds = $model->where('id', $id)->first();
        $ads = $getAds->click;

        $adsupdate['click'] = ($ads + 1);
        $model->update($id, $adsupdate);

        echo "Add Click One";
        die();
    }



}
