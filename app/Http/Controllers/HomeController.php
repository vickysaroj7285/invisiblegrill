<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $slides = [
            ['img' => 'slide1.jpg', 'kicker' => 'slide1Kicker', 'title' => 'slide1Title', 'sub' => 'slide1Sub'],
            ['img' => 'slide2.jpg', 'kicker' => 'slide2Kicker', 'title' => 'slide2Title', 'sub' => 'slide2Sub'],
            ['img' => 'slide3.jpg', 'kicker' => 'slide3Kicker', 'title' => 'slide3Title', 'sub' => 'slide3Sub'],
        ];

        $products = [
            ['img' => 'slide1.jpg',  'cat' => 'prod1Cat', 'title' => 'prod1Title', 'desc' => 'prod1Desc', 'tags' => ['prod1Tag1', 'prod1Tag2', 'prod1Tag3']],
            ['img' => 'spice.png',   'cat' => 'prod2Cat', 'title' => 'prod2Title', 'desc' => 'prod2Desc', 'tags' => ['prod2Tag1', 'prod2Tag2', 'prod2Tag3']],
            ['img' => 'slide2.jpg',  'cat' => 'prod3Cat', 'title' => 'prod3Title', 'desc' => 'prod3Desc', 'tags' => ['prod3Tag1', 'prod3Tag2', 'prod3Tag3']],
            ['img' => 'hero.jpg',    'cat' => 'prod4Cat', 'title' => 'prod4Title', 'desc' => 'prod4Desc', 'tags' => ['prod4Tag1', 'prod4Tag2', 'prod4Tag3']],
            ['img' => 'slide3.jpg',  'cat' => 'prod5Cat', 'title' => 'prod5Title', 'desc' => 'prod5Desc', 'tags' => ['prod5Tag1', 'prod5Tag2', 'prod5Tag3']],
            ['img' => 'slide1.jpg',  'cat' => 'prod6Cat', 'title' => 'prod6Title', 'desc' => 'prod6Desc', 'tags' => ['prod6Tag1', 'prod6Tag2', 'prod6Tag3']],
            ['img' => 'slide2.jpg',  'cat' => 'prod7Cat', 'title' => 'prod7Title', 'desc' => 'prod7Desc', 'tags' => ['prod7Tag1', 'prod7Tag2', 'prod7Tag3']],
            ['img' => 'closeup.jpg', 'cat' => 'prod8Cat', 'title' => 'prod8Title', 'desc' => 'prod8Desc', 'tags' => ['prod8Tag1', 'prod8Tag2', 'prod8Tag3']],
        ];

        $videos = [
            ['thumb' => 'video-image/1.jpeg', 'video_file' => '1.mp4', 'duration' => '0:00', 'title' => 'vid1Title', 'desc' => 'vid1Desc'],
            ['thumb' => 'video-image/2.jpeg', 'video_file' => '2.mp4', 'duration' => '0:00', 'title' => 'vid2Title', 'desc' => 'vid2Desc'],
            ['thumb' => 'video-image/3.jpeg', 'video_file' => '3.mp4', 'duration' => '0:00', 'title' => 'vid3Title', 'desc' => 'vid3Desc'],
            ['thumb' => 'video-image/4.jpeg', 'video_file' => '4.mp4', 'duration' => '0:00', 'title' => 'vid4Title', 'desc' => 'vid4Desc'],
            ['thumb' => 'video-image/5.jpeg', 'video_file' => '5.mp4', 'duration' => '0:00', 'title' => 'vid5Title', 'desc' => 'vid5Desc'],
        ];

        $reviews = [
            [
                'img'   => 'closeup.jpg',
                'name'  => 'Rahul Sharma',
                'role'  => 'Apartment Owner, Vesu, Surat',
                'stars' => 5,
                'text'  => 'InvisibleGrill की team ने 3 दिन में पूरी बालकनी install कर दी। काम बहुत साफ और professional था। बच्चे अब safe हैं और view भी block नहीं हुआ।',
            ],
            [
                'img'   => 'hero.jpg',
                'name'  => 'Priya Mehta',
                'role'  => 'Villa Owner, Adajan, Surat',
                'stars' => 5,
                'text'  => 'Excellent quality and very professional team. The grill is completely invisible and the finish is perfect. My French windows look the same but now feel completely safe.',
            ],
            [
                'img'   => 'slide1.jpg',
                'name'  => 'Ankit Gupta',
                'role'  => 'Homeowner, Athwa, Surat',
                'stars' => 5,
                'text'  => 'पहले बहुत doubt था कि invisible grill कितनी strong होगी। लेकिन install होने के बाद बिल्कुल satisfied हूं। दिखता नहीं और एकदम solid है।',
            ],
            [
                'img'   => 'slide2.jpg',
                'name'  => 'Sunita Rao',
                'role'  => 'Flat Owner, Pal, Surat',
                'stars' => 5,
                'text'  => 'हमारे 15वें floor की बालकनी में pigeons की बहुत problem थी। InvisibleGrill ने एक ही दिन में problem solve कर दी। Price भी reasonable था।',
            ],
            [
                'img'   => 'slide3.jpg',
                'name'  => 'Vikram Singh',
                'role'  => 'Office Manager, Katargam, Surat',
                'stars' => 5,
                'text'  => 'We installed InvisibleGrill across our entire 5-floor office building. The team was punctual, clean and the quality is outstanding. Highly recommended for commercial use.',
            ],
            [
                'img'   => 'closeup.jpg',
                'name'  => 'Neha Joshi',
                'role'  => 'Homeowner, Althan, Surat',
                'stars' => 5,
                'text'  => '10 साल की warranty और SS304 material सुनकर trust आया। Install होने के बाद घर की beauty भी बढ़ गई। बच्चों के लिए बहुत जरूरी था।',
            ],
        ];

        return view('home', compact('slides', 'products', 'videos', 'reviews'));
    }
}
