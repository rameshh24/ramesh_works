<?php
/**
* @file
*  Contains Drupal\custom_paragraph\Form
*/
namespace Drupal\custom_paragraph\Form;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ParagraphFieldForm extends ConfigFormBase {
/**
* { @inheritdoc }
*
*/
  function getFormId(){
    return 'ParagraphFieldForm';
  }
  /*
  * { @inheritdoc }
  */
  function getEditableConfigNames() {
    return [
      'custom_paragraph.adminsettings'
    ];
  }

  /*
  * { @inheritdoc }
  */
  function buildForm(array $form, FormStateInterface $form_state) {
    $url = Url::fromRoute('<front>')->toString();;
    $config = $this->config('custom_paragraph.adminsettings');
    $form['caption_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Caption'),
      '#default_value' => $config->get('caption_text')
    ];

    $form['links'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link'),
      '#default_value' => $config->get('links'),
    //  '#url' => $url
    ];
    $form['link_text'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link Text'),
      '#default_value' => $config->get('link_text')
    ];
  /*  $form['short_link'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Short Link'),
      '#options' => ['external' => TRUE],
      '#default_value' => $config->get('short_link')
    ];*/
    $form['welcome_message'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Short Description'),
      '#description' => $this->t('Welcome Message display to users when they login'),
      '#default_value' => $config->get('welcome_message')
    ];
    return parent::buildForm($form, $form_state);
  }
  function submitForm(array &$form, FormStateInterface $form_state){
    parent::submitForm($form, $form_state);
    $this->config('custom_paragraph.adminsettings')
    ->set(
      'caption_text', $form_state->getValue('caption_text')
      //'caption_text2', $form_state->getValue('caption_text2'),
      //'linkss', $form_state->getValue('linkss'),
      )
    ->save();
    $this->config('custom_paragraph.adminsettings')
    ->set('welcome_message', $form_state->getValue('welcome_message'))->save();
    $this->config('custom_paragraph.adminsettings')
    ->set('links', $form_state->getValue('links'))->save();
    $this->config('custom_paragraph.adminsettings')
    ->set('link_text', $form_state->getValue('link_text'))->save();
  }

  function custom_paragraph_preprocess_node_add_list(array &$variables) {
    $variables['hello'] = 'world';
  }
}
