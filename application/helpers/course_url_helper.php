<?php

// NOTE(kayvonf): These convenience methods need to match site routes

function lecture_url($shortname) {
    return site_url('lecture/' . $shortname);
}

function slide_url($shortname, $slide_number) {
    return site_url("lecture/" . $shortname . "/" . $slide_number);
}

function lecture_writeup_url($shortname) {
    return site_url('article/' . $shortname);
}

function article_url($id) {
    return site_url('article/' . $id);
}

// Returns the html for a kayvon style button. If $url is not null,
// this is a link to $url. Attributes can be added via the third 
// paramter, like this:
//
//      echo kayvon_button("Click me", NULL, array("id" => "click-button"));
//
// Which would produce the kayvon button equivalent to:
//
//      <button id="click-button" class="kayvon-button">[Click me]</button>
//
// Note that none of the attributes should contain double quotes.
//
// Another example: 
//
//      echo kayvon_button("Click me", "admin")
//
// Would produce the kayvon button equivalent to:
//
//      <a href=<?php echo site_url("admin"); ? >>[Click Me]</a>
//
function kayvon_button($text, $url = NULL, $attributes = array()) {
    if (isset($attributes['class'])) {
        $attributes['class'] .= ' kayvon-button';
    } else {
        $attributes['class'] = 'kayvon-button';
    }

    if ($url) {
        $attributes['href'] = site_url($url);
    }
    
    $ret = "<a";
    foreach($attributes as $key => $value) {
        $ret .= " " . $key . '="' . $value . '"';
    }
    $ret .= ">[" . $text . "]</a>";

    return $ret;
}
