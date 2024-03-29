<?php
require "inc/functions.php";
$dropPage = allSeasonList();
$weekPage = allWeekList();
header('Content-Type: application/xml; charset=utf-8');
?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xhtml="http://www.w3.org/1999/xhtml" xsi:schemaLocation="
            http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>https://cop-finder.com/</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/en/</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/en/faq</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/faq" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/faq" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/faq" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/en/contact</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/contact" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/contact" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/contact" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/en/videos</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/videos" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/videos" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/videos" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/fr/</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/en/products/1</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/products/1" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/products/1" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/products/1" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.70</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/en/products/3</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/products/3" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/products/3" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/products/3" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.70</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/en/products/2</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/products/2" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/products/2" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/products/2" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.70</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/fr/faq</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/faq" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/faq" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/faq" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/fr/contact</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/contact" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/contact" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/contact" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/fr/videos</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/videos" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/videos" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/videos" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.80</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/fr/products/1</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/products/1" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/products/1" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/products/1" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.70</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/fr/products/3</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/products/3" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/products/3" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/products/3" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.70</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/fr/products/2</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/products/2" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/products/2" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/products/2" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.70</priority>
    </url>
    <url>
        <loc>https://cop-finder.com/fr/droplist/latest/</loc>
        <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/droplist/latest/" />
        <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/droplist/latest/" />
        <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/droplist/latest/" />
        <lastmod>2020-06-11T07:19:50+00:00</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.70</priority>
    </url>

    <?php

    foreach ($dropPage as $row) {
    ?>
        <url>
            <loc>https://cop-finder.com/fr/droplist/season/<?= $row['season']; ?></loc>
            <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/droplist/season/<?= $row['season']; ?>" />
            <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>" />
            <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>" />
            <lastmod>2020-06-10T07:23:30+00:00</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.70</priority>
        </url>
        <url>
            <loc>https://cop-finder.com/en/droplist/season/<?= $row['season']; ?></loc>
            <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/droplist/season/<?= $row['season']; ?>" />
            <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>" />
            <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>" />
            <lastmod>2020-06-10T07:23:30+00:00</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.70</priority>
        </url>
    <?php } ?>

    <?php

    foreach ($weekPage as $row) {
    ?>
        <url>
            <loc>https://cop-finder.com/fr/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?></loc>
            <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?>" />
            <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?>" />
            <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?>" />
            <lastmod>2020-06-10T07:23:30+00:00</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.70</priority>
        </url>
        <url>
            <loc>https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?></loc>
            <xhtml:link rel="alternate" hreflang="fr" href="https://cop-finder.com/fr/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?>" />
            <xhtml:link rel="alternate" hreflang="en" href="https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?>" />
            <xhtml:link rel="alternate" hreflang="x-default" href="https://cop-finder.com/en/droplist/season/<?= $row['season']; ?>/week/<?= $row['week']; ?>" />
            <lastmod>2020-06-10T07:23:30+00:00</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.70</priority>
        </url>
    <?php } ?>

</urlset>