<?php

namespace Endeavors\Support\Html\Tag;

use MabeEnum\Enum;

/**
 * Represent Tags
 * Open tags may have attributes
 */
final class Tag extends Enum
{
    // Open tags
    const aopen = "<a";
    const abbr = "<abbr";
    const address = "<address";
    const area = "area";
    const articleopen = "<article";
    const asideopen = "<aside";
    const audioopen = "<audio";
    const bopen = "<b>";
    const base = "<base";
    const bdiopen = "<bdi>";
    const bdoopen = "<bdo";
    const blockquoteopen = "<blockquote";
    const bodyopen = "<body";
    const br = "<br";
    const buttonopen = "<button";
    const spanopen = "<span";
    const strongopen = "<strong";

    // closed tags
    const aclosed = "</a>";
    const abbrclosed = "</abbr>";
    const addressclosed = "</address>";
    const articleclosed = "</article>";
    const asideclosed = "</aside>";
    const audioclosed = "</audio>";
    const bclosed = "</b>";
    const bdiclosed = "</bdi>";
    const bdoclosed = "</bdo>";
    const blockquoteclosed = "</blockquote>";
    const bodyclosed = "</body>";
    const buttonclosed = "</button>";
    const spanclosed = "</span>";
    const strongclosed = "</strong>";
}