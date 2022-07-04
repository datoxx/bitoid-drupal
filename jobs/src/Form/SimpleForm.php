<?php

namespace Drupal\jobs\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormSubmitterInterface;
use Drupal\jobs\Controller\Jobs;

class SimpleForm extends FormBase {

    public function getFormId() {
        return 'jobs';
    }

    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['title_company_exper'] = [
         '#type' => 'textfield', 
         '#title' => $this->t('title'),
         '#placeholder' => $this->t('title, company ..'),
        ];

        $form['location'] = [
            '#type' => 'textfield',
            '#title' => $this->t('location'),
            '#placeholder' => $this->t('location'),
           ];

        $form['time'] = [
            '#type' => 'checkbox',
            '#title' => $this->t('full time'),
        ];


        $form['actions']['#type'] = 'actions';
        $form['actions']['submit'] = [
            '#type' => 'submit',
            '#value' => $this->t('search job'),
            '#button_type' => 'primary',
        ];

        return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
        // $first_name = $form_state['values']['title_company_exper']; 
        // $last_name = $form_state['values']['location'];
        // $last_name = $form_state['values']['time'];

        // $jobs = new Jobs();
        // $jobs->content($formstate = $form_state);




      
    }
}