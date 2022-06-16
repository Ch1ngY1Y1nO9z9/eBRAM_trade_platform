<?php

namespace App\Http\Livewire\FileManagement;

use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class Index extends Component
{
    use WithFileUploads;

    public $file;
    public $toLang;
    public $fromLang;
    public $token;
    public $translateText;

    public function mount()
    {
        $this->getToken();
    }

    public function render()
    {
        return view('livewire.file-management.index');
    }

    public function getToken()
    {
        $fields = [
            'username' => 'kho@lscm.hk',
            'password' => 'Mtm@12345',
        ];
        $postdata = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://earbtranslation.eastasia.cloudapp.azure.com/InvestHK_API_Test/Auth/AccessToken');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($ch));
        $this->token = $result->token;
    }

    public function translateFile()
    {

        // $fields = [
        //     'fromLanguage' => $this->fromLang,
        //     'toLanguage' => $this->toLang,
        //     'file' => $this->file
        // ];

        // $header = [
        //     'Authorization: Bearer '.$this->token
        // ];

        // $postdata = http_build_query($fields);
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, 'http://earbtranslation.eastasia.cloudapp.azure.com/InvestHK_API_Test/Translation/TranslateDocument');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        // $result = curl_exec($ch);

        $this->translateText = '測試一些翻譯功能。';
    }
}
