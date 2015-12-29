

define (TEXT_BLOCK_SECTION, 0);
define (TEXT_BLOCK_PARAGRAPH, 1);

class Content_Block {
    var $type;
    var $blocks = array();
}

class Content_Section extends Content_Block {
    var $title = '';
    var $label = '';
}



