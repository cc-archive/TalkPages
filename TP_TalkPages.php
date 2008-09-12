<?php
/**
 * Talk Pages main function.
 *
 * @author Yaron Koren
 * @author Steren Giannini
 */

global $wgHooks;
$wgHooks[ 'SkinTemplateTabs' ][] = 'createDualTalk';

/**
 * Adds "actions" (i.e., tabs)
 */
function createDualTalk(/*article*/ $obj, $content_actions) {

  // make sure that this is not itself a category page, and that the user
  // is allowed to edit it
  if (isset($obj->mTitle) && ($obj->mTitle->getNamespace() != NS_CATEGORY)) {
 
      global $wgRequest, $wgUser;

      // create the form edit tab, and apply whatever changes are specified
      // by the edit-tab global variables
     $comment_tab_text = 'comment'; //TODO wfMsg('comment');
    
    /*
    //This may be useful to rename "talk"     
    if (array_key_exists('edit', $content_actions)) {
         $content_actions['edit']['text'] = $user_can_edit ? wfMsg('sf_editsource') : wfMsg('viewsource');
     }
    */

      $class_name = ($wgRequest->getVal('action') == 'comment') ? 'selected' : '';
      $comment_tab = array(
        'class' => $class_name,
        'text' => $form_edit_tab_text,
        'href' => $obj->mTitle->getLocalURL('action=comment')
      );

      // find the location of the 'talk' tab, and add 'comments'
      // right before it.
      // this is a "key-safe" splice - it preserves both the keys and
      // the values of the array, by editing them separately and then
      // rebuilding the array.
      // based on the example at http://us2.php.net/manual/en/function.array-splice.php#31234
      $tab_keys = array_keys($content_actions);
      $tab_values = array_values($content_actions);
      $talk_tab_location = array_search('talk', $tab_keys);
      // this should rarely happen, but if there was no talk
      // tab, set the location index to -1, so the tab shows up near the end
      if ($edit_tab_location == NULL)
        $talk_tab_location = -1;
      array_splice($tab_keys, $talk_tab_location, 0, 'comment');
      array_splice($tab_values, $talk_tab_location, 0, array($comment_tab));
      $content_actions = array();
      for ($i = 0; $i < count($tab_keys); $i++)
        $content_actions[$tab_keys[$i]] = $tab_values[$i];

      return true;
  }
  return true; // always return true, in order not to stop MW's hook processing!
}

?>
