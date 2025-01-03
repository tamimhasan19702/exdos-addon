<?php


function exdos_addon_kses($content = '')
{
    $allowed_html = [

        'span' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'i' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'a' => [
            'class' => [],
            'id' => [],
            'href' => [],
            'style' => [],
            'target' => [],
            'rel' => [],
        ],
        'br' => [
        ],
        'p' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h1' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h2' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h3' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h4' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h5' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'h6' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'img' => [
            'src' => [],
            'alt' => [],
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'ul' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'li' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'ol' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'blockquote' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'pre' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'code' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'table' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'tr' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'td' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'th' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dl' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dt' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'dd' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'video' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'autoplay' => [],
            'controls' => [],
            'loop' => [],
            'muted' => [],
            'playsinline' => [],
            'preload' => [],
            'src' => [],
            'poster' => [],
            'width' => [],
            'height' => [],
        ],
        'source' => [
            'src' => [],
            'type' => [],
            'media' => [],
            'sizes' => [],
        ],
        'strong' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'b' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'em' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'i' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'div' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'button' => [
            'class' => [],
            'id' => [],
            'style' => [],
        ],
        'input' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'type' => [],
            'name' => [],
            'value' => [],
            'placeholder' => [],
        ],
        'textarea' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'name' => [],
            'placeholder' => [],
        ],
        'select' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'name' => [],
        ],
        'option' => [
            'class' => [],
            'id' => [],
            'style' => [],
            'value' => [],
        ],
        'svg' => [
            'xmlns' => [],
            'fill' => [],
            'viewbox' => [],
            'role' => [],
            'aria-hidden' => [],
            'focusable' => [],
            'height' => [],
            'width' => [],
        ],
        'path' => [
            'd' => [],
            'fill' => [],
        ],
        'iframe' => [
            'src' => [],
            'width' => [],
            'height' => [],
            'frameborder' => [],
            'allowfullscreen' => [],
        ],
        'strong' => [
            'class' => [],
            'id' => [],

        ],
    ];

    return wp_kses($content, $allowed_html);
}