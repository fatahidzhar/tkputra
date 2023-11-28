<?php

function breadcrumbs($data)
{
    $breadcrumbs = '<nav class="flex" aria-label="Breadcrumb">
    <ol class="inline-flex items-center">';
    $i = 1;
    $total = count($data);
    foreach ($data as $key => $value) {
        $breadcrumbs .= '<li class="inline-flex items-center">';
        if ($i === 1) {
            $breadcrumbs .= '<i class="bi bi-grid-fill text-sm mr-2 text-gray-400"></i> ';
        }
        $breadcrumbs .= '';
        if (!empty($value)) {
            $breadcrumbs .= '<a href="'.$value.'">'.$key.'</a><svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
        } else {
            $breadcrumbs .= $key;
        }
        $breadcrumbs .= '</li>';
        $i++;
    }
    $breadcrumbs .= '</ol>';
    return $breadcrumbs;
}