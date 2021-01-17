<?php

function inputElement(){
    $ele="
    <div class=\"input-group mb-3\">
            <span class=\"input-group-text bg-warning\" id=\"basic-addon1\"><i class=\"fa fa-id-badge\" aria-hidden=\"true\"></i></span>
            <input type=\"text\" autocomplete=\"off\" class=\"form-control\" placeholder=\"ID\" aria-label=\"id\" aria-describedby=\"basic-addon1\">
        </div>
    ";
    echo $ele;
}