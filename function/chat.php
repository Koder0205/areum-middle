<?php
    function kakao($text,$photo,$url,$input){
        $message = '{"message": {';
        if($text != NULL){    $message .= '"text": "'.$text.'"';    }
        if($photo != NULL){    $message .= ',"photo": {"url": "'.$photo[0].'", "width": '.$photo[1].', "height": '.$photo[2].'}';    }
        if($url != NULL){    $message .= ',"message_button": {"label": "'.$url[0].'", "url": "'.$url[1].'"}';    }
        $message .= '}';
        if($input != NULL){
            $buttons = '"buttons" : [';
            for ($i = 0; $i < count($input); $i++) {
                $buttons = $buttons . '"' . $input[$i] . '"';
                if ($i !== count($input)-1){$buttons = $buttons . ', ';}
            }
            $buttons = $buttons . '] ';
            $keyboard = ',"keyboard" : { "type" : "buttons", '."$buttons".'} ';
            $message .= $keyboard;
        }
        $message .= '}';
        
        echo $message;
        return;
    }
    function facebook($sender,$text, $input){
        $message = '{"recipient":{ "id":"' . $sender . '" },"message":{';
            if($text != NULL){    $message .= '"text": "'. $text .'",';    }
            if($input != NULL){
                $buttons = '"quick_replies":[';
                for ($i = 0; $i < count($input); $i++) {
                    $buttons = $buttons . '{
                        "content_type":"text",
                        "title":"'.$input[$i].'",
                        "payload":"<DEVELOPER_DEFINED_PAYLOAD>"
                    }';
                    if ($i !== count($input)-1){$buttons .= ', ';}
                }
                $buttons = $buttons . '] ';
                $message .= $buttons;
            }
            $message .= '}}';
        return $message;
    }
?>