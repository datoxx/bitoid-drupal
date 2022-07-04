<?php

namespace Drupal\jobs\Controller;


use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\file\Entity\File;
use Drupal\image\Entity\ImageStyle;


class Jobs  extends ControllerBase {

    public function content() {

    $request_title = \Drupal::request()->request->get('title');
    $request_location = \Drupal::request()->request->get('location');
    $request_time = \Drupal::request()->request->get('time');


    $node_storage = \Drupal::entityTypeManager()->getStorage('node');

    if(!$request_title && !$request_location && !$request_time) {
        $nids = $node_storage->getQuery()
            ->condition('type', 'jobs')
            ->execute();
    } else if($request_title && $request_location){
      $nids = $node_storage->getQuery()
        ->condition('type', 'jobs')
        ->condition('field_country.value', $request_location)
        ->condition('title.value', $request_title)
        ->execute();
    } else if(!$request_location && !$request_time){
        $nids = $node_storage->getQuery()
            ->condition('type', 'jobs')
            ->condition('title.value', $request_title)
            ->execute();
    } else if(!$request_title && !$request_time){
        $nids = $node_storage->getQuery()
          ->condition('type', 'jobs')
          ->condition('field_country.value', $request_location)
          ->execute();
    } else if($request_location && $request_time){
        $nids = $node_storage->getQuery()
          ->condition('type', 'jobs')
          ->condition('field_boolen_time.value', $request_time)
          ->condition('field_country.value', $request_location)
          ->execute();
    }  else if($request_title && $request_time){
      $nids = $node_storage->getQuery()
        ->condition('type', 'jobs')
        ->condition('field_boolen_time.value', $request_time)
        ->condition('title.value', $request_title)
        ->execute();
    }  else if($request_title && $request_time && $request_time){
        $nids = $node_storage->getQuery()
          ->condition('type', 'jobs')
          ->condition('field_country.value', $request_location)
          ->condition('title.value', $request_title)
          ->condition('field_boolen_time.value', $request_time)
          ->execute();
    }  else if($request_time){
        $nids = $node_storage->getQuery()
          ->condition('type', 'jobs')
          ->condition('field_boolen_time.value', $request_time)
          ->execute();
    } 
    // dump($nids);
    // die;
      $jobs = [];
      foreach($nids as $nid) {
        $node = Node::load($nid);
        $fid = $node->field_company_image->getValue()[0]['target_id'];
          $file = File::load($fid);
          // Get origin image URI.
          $image_uri = $file->getFileUri();
          // Load image style "thumbnail".
          $style = ImageStyle::load('thumbnail');
          // Get URL.
          $url = $style->buildUrl($image_uri);
        $jobs[$nid] = [
          'bool' => $node->field_boolen_time->getValue()[0]['value'],
          'nid' => $nid,
          'thumbnail'=> $url,
          'time'=> $node->field_work_time->getValue()[0]['value'],
          'title'=> $node->getTitle(),
          'country'=> $node->field_country->getValue()[0]['value'],
          'position' => $node->field_position->getValue()[0]['value'],
        ];
      }

    // $request_title = \Drupal::request()->request->get('title_company_exper');
    // $request_location = \Drupal::request()->request->get('location');
    // dump($request_location);
    // die;
    // if($request_location === null) {
    //     $node_storage = \Drupal::entityTypeManager()->getStorage('node');
    //     $nids = $node_storage->getQuery()
    //         ->condition('type', 'jobs')
    //         ->execute();

    // } else {
    //     $node_storage = \Drupal::entityTypeManager()->getStorage('node');
    //     $nids = $node_storage->getQuery()
    //         ->condition('type', 'jobs')
    //         ->condition('field_country.value', $request_location)
    //         ->execute();

    // }

    //     $results = Node::loadMultiple($nids);
    //     $jobs = [];

    //     foreach( $results as $result){
    //       $fid = $result->field_company_image->getValue()[0]['target_id'];
    //       $file = File::load($fid);
    //       // Get origin image URI.
    //       $image_uri = $file->getFileUri();
    //       // Load image style "thumbnail".
    //       $style = ImageStyle::load('thumbnail');
    //       // Get URL.
    //       $url = $style->buildUrl($image_uri);
    //         $thumbnail = $url;
    //         $title = $result->title->value;
    //         $time = $result->field_work_time->value;
    //         $country = $result->field_country->value; 
    //         $jobs[]=[
    //             'title' => $title, 
    //             'time' => $time, 
    //             'country' => $country, 
    //             'thumbnail' => $thumbnail
    //         ];   
    //     }


    return [
      // Your theme hook name.
      '#theme' => 'jobs_list',
      // Your variables.
      '#jobs' =>  $jobs,
    ];

    }
}

