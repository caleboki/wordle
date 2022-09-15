<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TryCat</title>
    <!-- <link rel="stylesheet" href="/css/app.css"> -->
    <!-- <script src="/js/app.js"></script> -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="//unpkg.com/alpinejs" defer></script>

</head>
<body>
    <!-- <div id="game">
        <div class="row">
            <div class="tile"></div>
            <div class="tile"></div>
            <div class="tile"></div>
        </div>

        <div class="row">
            <div class="tile"></div>
            <div class="tile"></div>
            <div class="tile"></div>
        </div>

        <div class="row">
            <div class="tile"></div>
            <div class="tile"></div>
            <div class="tile"></div>
        </div>
    </div> -->

    <!-- Using AlpineJs -->

    <main x-data = "game"
        @keyup.window="onKeyPress($event.key)">

        <h2 aria-label="TryCats">
            <!-- <img src="/images/logo.svg" alt=""> -->
        </h2>

        <div id="game" >
            <!-- <input type="text" x-model="this.guessesAllowed"> -->
            <template x-for="(row, index) in board">
                <div class="row" :class="{'current' : currentRowIndex === index, 'invalid' : currentRowIndex === index && errors}">

                    <template x-for="tile in row">
                        <div class="tile" :class="tile.status" x-text="tile.letter">

                        </div>
                    </template>

                </div>
            </template>
        </div>

        <output x-text="message"></output>

        <div id="keyboard" @click.stop="$event.target.matches('button') && onKeyPress($event.target.textContent)">

            <template x-for="row in letters">
                <div class="row">
                    <template x-for="key in row">
                        <button
                            class="key"
                            :class="matchingTileForKey(key)?.status"
                            type="button"
                            x-text="key">
                        </button>
                    </template>
                </div>
            </template>

        </div>

    </main>



</body>
</html>
