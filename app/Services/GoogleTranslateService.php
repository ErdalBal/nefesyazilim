<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleTranslateService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GOOGLE_TRANSLATE_API_KEY');
    }

    public function translate($text, $targetLanguage, $sourceLanguage = 'auto')
{
    $response = Http::get('https://translation.googleapis.com/language/translate/v2', [
        'q' => $text,
        'target' => $targetLanguage,
        'source' => $sourceLanguage,
        'key' => $this->apiKey,
    ]);

    if ($response->successful()) {
        $responseData = $response->json();
        if (isset($responseData['data']['translations'][0]['translatedText'])) {
            return $responseData['data']['translations'][0]['translatedText'];
        } else {
            // Yanıtta çeviri metni yoksa hata döndür
            return 'Çeviri bulunamadı.';
        }
    }

    // Başarısız yanıt durumunda hata mesajı döndür
    return 'Google API hatası: ' . $response->body();
}

}
