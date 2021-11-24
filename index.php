<?php
header('Access-Control-Allow-Origin: null');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VUE IFRAME Test</title>
    <link rel="stylesheet" href="styles/main.css" />
    <script type="text/javascript">
        console.log('Ready to goooooo!');

        /*document.addEventListener('readystatechange', (e) => {
            const iframe = document.querySelector('#iframe-container iframe').contentWindow;

            if (document.readyState === 'complete') {
                console.log('iframe', iframe);
                iframe.postMessage(['parentReady'], '*');
            }
        });*/

        window.addEventListener('message', e => {
            const myIframe = document.querySelector('#iframe-container iframe');

            // Don't continue if message source is not the iframe (w/out same-origin-allow set)
            if (e.origin !== 'http://localhost:8080') {
                console.error("Received a message from an unexpected source")
                return;
            }

            let [event, data] = e.data;

            if (event === 'setIframeHeight') {
                myIframe.height = `${data}px`;
            } else {
                console.info(`Unknown event sent: ${JSON.stringify(event)}`)
            }
        })
    </script>
</head>
<body>
<header><h1>VUE IFRAME Test</h1></header>
<div class="main-content">
<?php
$user = 'jbillings';
$data = [
    [
        'title' => "Record Number One",
        'content' => "Lines unto felt native charms did den some me. A from she stalked for or, he and was revel dwell.",
    ],
    [
        'title' => "Record Number Two",
        'content' => "Harold childe he where present the childe childe. The like almost felt this feud companie, cheer formed to this worse.",
    ],
    [
        'title' => "Record Number Three",
        'content' => "The breast since childe wassailers me, mine satiety begun not venerable deemed earthly the to, save flatterers might him say.",
    ],
    [
        'title' => "Record Number Four",
        'content' => "Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere.",
    ],
    [
        'title' => "Record Number Five",
        'content' => "Nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur,",
    ],
];

echo '<div id="iframe-container"><iframe src="http://localhost:8080" sandbox="allow-scripts allow-same-origin allow-top-navigation" referrerpolicy="origin-when-cross-origin" loading="lazy" seamless><p>This browser does not support iframes. :(</p></iframe></div>'
?>
</div>

<footer>Some footer information goes here</footer>

</body>
</html>
