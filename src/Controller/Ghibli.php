<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Ghibli extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(): Response
    {
        $client = HttpClient::create();
        try {
            $response = $client->request('GET', 'https://ghibliapi.herokuapp.com/films');
        } catch (TransportExceptionInterface $e) {
            //TODO: throw exception here
        }

        try {
            $updatedArray = [];
            $data = json_decode($response->getContent(), true);

            foreach ($data as $item) {
                $info = $item;

                if ($item['title'] === 'Castle in the Sky') {
                    $info['image'] = 'https://cdna.artstation.com/p/assets/images/images/023/426/556/large/azuri-909-laputa.jpg';
                } elseif ($item['title'] === 'Grave of the Fireflies') {
                    $info['image'] = 'https://www.denofgeek.com/wp-content/uploads/2018/04/grave-main.jpg';
                } elseif ($item['title'] === 'Kiki\'s Delivery Service') {
                    $info['image'] = 'https://cdnb.artstation.com/p/assets/images/images/012/279/193/large/azuri-909-kiky.jpg';
                } elseif ($item['title'] === 'Only Yesterday') {
                    $info['image'] = 'https://events.umich.edu/media/cache/event_large_lightbox/media/attachments/2016/05/event_30745_original.jpeg';
                } elseif ($item['title'] === 'Porco Rosso') {
                    $info['image'] = 'https://cdnb.artstation.com/p/assets/images/images/023/674/001/large/matheus-franco-porco-rosso-sign.jpg';
                } elseif ($item['title'] === 'Pom Poko') {
                    $info['image'] = 'http://images.amcnetworks.com/ifccenter.com/wp-content/uploads/2015/12/POM_POKO_03_1004821.jpg';
                } elseif ($item['title'] === 'When Marnie Was There') {
                    $info['image'] = 'https://cdna.artstation.com/p/assets/images/images/014/072/486/large/azuri-909-marnie.jpg';
                } elseif ($item['title'] === 'Whisper of the Heart') {
                    $info['image'] = 'https://i2.wp.com/nerdvanamedia.com/wp-content/uploads/2019/02/whisper-of-the-heart.jpg?w=716&ssl=1';
                } elseif ($item['title'] === 'Princess Mononoke') {
                    $info['image'] = 'https://cdnb.artstation.com/p/assets/images/images/010/596/737/large/azuri-909-mononoke.jpg';
                } elseif ($item['title'] === 'My Neighbors the Yamadas') {
                    $info['image'] = 'https://66.media.tumblr.com/8c9011255fd9dfffd18a4f27a995ef71/tumblr_pi5i06NUWZ1re1poeo1_1280.jpg';
                } elseif ($item['title'] === 'Spirited Away') {
                    $info['image'] = 'https://cdna.artstation.com/p/assets/images/images/023/426/486/large/azuri-909-spirited.jpg?1579165259';
                } elseif ($item['title'] === 'The Cat Returns') {
                    $info['image'] = 'https://niizk.files.wordpress.com/2008/09/the_cat_returns_.jpg';
                } elseif ($item['title'] === 'Howl\'s Moving Castle') {
                    $info['image'] = 'https://cdna.artstation.com/p/assets/images/images/014/072/464/large/azuri-909-howl.jpg';
                } elseif ($item['title'] === 'Tales from Earthsea') {
                    $info['image'] = 'https://i.pinimg.com/564x/0b/d4/83/0bd483ff31399d5d5b071cff110ead1d.jpg';
                } elseif ($item['title'] === 'Ponyo') {
                    $info['image'] = 'https://cdnb.artstation.com/p/assets/images/images/012/306/077/large/azuri-909-ponyo.jpg';
                } elseif ($item['title'] === 'Arrietty') {
                    $info['image'] = 'https://cdnb.artstation.com/p/assets/images/images/012/276/689/large/azuri-909-arriety.jpg';
                } elseif ($item['title'] === 'From Up on Poppy Hill') {
                    $info['image'] = 'https://i.pinimg.com/564x/e5/b2/35/e5b235e04a8872dbc916bb2da0359f31.jpg';
                } elseif ($item['title'] === 'The Wind Rises') {
                    $info['image'] = 'https://i.pinimg.com/originals/2a/5e/72/2a5e72b3abdc165f368a8eaa23c7797c.jpg';
                } elseif ($item['title'] === 'The Tale of the Princess Kaguya') {
                    $info['image'] = 'http://2.bp.blogspot.com/-xAGuSa0QAfk/VIAL182EVWI/AAAAAAAAFX0/QyKFEiabIRw/s1600/Kaguyahime-2.jpg';
                } elseif ($item['title'] === 'My Neighbor Totoro') {
                    $info['image'] = 'https://cdnb.artstation.com/p/assets/images/images/023/426/583/large/azuri-909-totoro.jpg';
                }

                $updatedArray[] = $info;
            }

        } catch (ClientExceptionInterface $e) {
            //TODO: throw exception here
        } catch (RedirectionExceptionInterface $e) {
            //TODO: throw exception here
        } catch (ServerExceptionInterface $e) {
            //TODO: throw exception here
        } catch (TransportExceptionInterface $e) {
            //TODO: throw exception here
        }

        return $this->render('base.html.twig', [
            'data' => $updatedArray,
        ]);
    }
}
