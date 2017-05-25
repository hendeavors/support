<?php

namespace Endeavors\Support\Html\Tag;

use MabeEnum\Enum;

/**
 * Represent Tags
 * The enum ensures uniqueness
 */
final class Tag extends Enum
{
    // Open tags
    const aopen = "<a";
    const abbr = "<abbr";
    const address = "<address";
    const area = "<area";
    const articleopen = "<article";
    const asideopen = "<aside";
    const audioopen = "<audio";
    const bopen = "<b>";
    const base = "<base";
    const bdiopen = "<bdi>"; // html5
    const bdoopen = "<bdo";
    const blockquoteopen = "<blockquote";
    const bodyopen = "<body";
    const br = "<br";
    const buttonopen = "<button";
    const canvasopen = "<canvas"; // html5
    const centeropen = "<center";
    const citeopen = "<cite";
    const codeopen = "<code";
    const col = "<col";
    const colgroupopen = "<colgroup";
    const datalistopen = "<datalist";
    const ddopen = "<dd";
    const delopen = "<del";
    const detailsopen = "<details";
    const dialogopen = "<dialog";
    const dfnopen = "<dfn";
    const diropen = "<dir";
    const divopen = "<div";
    const scriptopen = "<script";
    const sectionopen = "<section";
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
    const canvasclosed = "</canvas>";
    const centerclosed = "</center>";
    const citeclosed = "</cite>";
    const codeclosed  = "</code>";
    const colgroupclosed = "</colgroup>";
    const datalistclosed = "</datalist>";
    const ddclosed = "</dd>";
    const delclosed = "</del>";
    const detailsclosed = "</details>";
    const dfnclosed = "</dfn>";
    const dialogclosed = "</dialog>";
    const dirclosed = "</dir>";
    const divclosed = "</div>";
    const scriptclosed = "</script>";
    const sectionclosed = "</section>";
    const spanclosed = "</span>";
    const strongclosed = "</strong>";
}
