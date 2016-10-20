var res = {
    HelloWorld_png : "res/HelloWorld.png",
    CloseNormal_png : "res/CloseNormal.png",
    CloseSelected_png : "res/CloseSelected.png",
    Bg_png : "res/bg.png",
    BgWelcome_jpg : "res/graphics/bgWelcome.jpg",
    TitleWelcome_png : "res/graphics/small_images/welcome_title.png",
    HeroWelcome_png : "res/graphics/small_images/welcome_hero.png",
    PlayBtn_png : "res/graphics/small_images/startButton.png",
    AboutBtn_png : "res/graphics/small_images/gameOver_aboutButton.png",
    Sound0000: "res/graphics/small_images/soundOn0000.png",
    Sound0001: "res/graphics/small_images/soundOn0001.png",
    Sound0002: "res/graphics/small_images/soundOn0002.png",
    SoundOff: "res/graphics/small_images/soundOff.png"



};

var g_resources = [];
for (var i in res) {
    g_resources.push(res[i]);
}