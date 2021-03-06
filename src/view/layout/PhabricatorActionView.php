<?php

/*
 * Copyright 2012 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

final class PhabricatorActionView extends AphrontView {

  private $name;
  private $icon;
  private $href;

  public function setHref($href) {
    $this->href = $href;
    return $this;
  }

  public function setIcon($icon) {
    $this->icon = $icon;
    return $this;
  }

  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  public function render() {

    $icon = null;
    if ($this->icon) {
      $icon = phutil_render_tag(
        'span',
        array(
          'class' => 'phabricator-action-view-icon autosprite '.
                       'action-'.$this->icon,
        ),
        '');
    }

    if ($this->href) {
      $item = phutil_render_tag(
        'a',
        array(
          'href' => $this->href,
          'class' => 'phabricator-action-view-item',
        ),
        phutil_escape_html($this->name));
    } else {
      $item = phutil_render_tag(
        'span',
        array(
          'class' => 'phabricator-action-view-item',
        ),
        phutil_escape_html($this->name));
    }

    return phutil_render_tag(
      'li',
      array(
        'class' => 'phabricator-action-view',
      ),
      $icon.$item);
  }


}
