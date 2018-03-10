<?php

$words = [
    'a',
    'b',
    'c',
    'd',
    'e',
    'f',
    'g',
    'h',
    'i',
    'j',
    'k',
    'l',
    'm',
    'n',
    'o',
    'p',
    'q',
    'r',
    's',
    't',
    'u',
    'v',
    'w',
    'x',
    'y',
    'z',
    '0',
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./engine.css">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>

</head>
<body>

<h1>PHPerKaigiトランスレーター</h1>

<h2>復号化</h2>

  <div id="app">
    記号をクリックしてください
    <template v-for="word in words">
      <div class="logo-object active" :class="word.class" @click="push(word)"></div>
    </template>
    <button @click="addSpace()">スペース</button>

    <br>
    <br>
    答え
    <template v-for="word in items">
      <span v-if="word.word == 'space'">&nbsp;&nbsp;</span>
      <span v-else class="logo-object active" :class="word.class" @click="push(word)"></span>
    </template>
    <br>
    <br>
    <template v-for="word in items">
      <span v-if="word.word == 'space'">&nbsp;&nbsp;</span>
      <span v-else>{{ word.word }}</span>
    </template>
</div>

  <script>
    new Vue({
      el: '#app',
      data: {
        words: [
          { word: 'a', class: '_a' },
          { word: 'b', class: '_b' },
          { word: 'c', class: '_c' },
          { word: 'd', class: '_d' },
          { word: 'e', class: '_e' },
          { word: 'f', class: '_f' },
          { word: 'g', class: '_g' },
          { word: 'h', class: '_h' },
          { word: 'i', class: '_i' },
          { word: 'j', class: '_j' },
          { word: 'k', class: '_k' },
          { word: 'l', class: '_l' },
          { word: 'm', class: '_m' },
          { word: 'n', class: '_n' },
          { word: 'o', class: '_o' },
          { word: 'p', class: '_p' },
          { word: 'q', class: '_q' },
          { word: 'r', class: '_r' },
          { word: 's', class: '_s' },
          { word: 't', class: '_t' },
          { word: 'u', class: '_u' },
          { word: 'v', class: '_v' },
          { word: 'w', class: '_w' },
          { word: 'x', class: '_x' },
          { word: 'y', class: '_y' },
          { word: 'z', class: '_z' },
          { word: '0', class: '_0' },
          { word: '1', class: '_1' },
          { word: '2', class: '_2' },
          { word: '3', class: '_3' },
          { word: '4', class: '_4' },
          { word: '5', class: '_5' },
          { word: '6', class: '_6' },
          { word: '7', class: '_7' },
          { word: '8', class: '_8' },
          { word: '9', class: '_9' },
        ],
        items: []
      },
      methods: {
        push: function(word) {
          this.items.push(word)
        },
        addSpace: function() {
          this.items.push({ word: 'space' })
        }
      }
    });
  </script>

    <hr />

<h2>暗号化</h2>
小文字で書いてね

<form action="./index.php" method="post">
    <input type="text" name="words" value="">
    <input type="submit" value="暗号化">
</form>

<?php

if ($_POST) {
    $postedWords = htmlspecialchars($_POST['words'], ENT_QUOTES, 'UTF-8');
    echo $postedWords . '<br />';
    $words = str_split($postedWords);
    foreach($words as $word) {
        $str = "<div class='logo-object active _{$word}'></div>";
        echo $str;
    }
}

?>

</body>
</html>
