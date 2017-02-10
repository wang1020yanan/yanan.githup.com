<template>
  <div id="app">

    <!-- <router-view></router-view> -->

    <div class="row" v-for="item in items">
      <div class="col-xs-12">
        <h4 class="news-title"><b>晨兴资本刘芹做企业不仅要务实，还要学会务虚</b></h4>
        <div class="row author">
          <div class="col-xs-3"><span class="author-item">王某某</span></div>
          <div class="col-xs-3"><span class="classification">投资人</span></div>
          <div class="col-xs-6 time"><span class="times">10月18日 13:00</span></div>
        </div>
        <div class="row content-wrap">
          <div class="col-xs-8 content"><div class="content-item"><a href="http://36kr.com/p/5054699.html">本文来源于晨星资本作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......</a></div></div>
          <div class="col-xs-4 img-wrap"><img class="logo-img" src="./assets/logo.png"></div>
          <div class="my-border"></div>
        </div>
      </div>
    </div> 
    <button id="loader" class="btn btn-default" type="submit" v-on:click="addNews()">加载中...</button>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      tit: 'aaaaa',
      items: [
      {ss: 'ds'},
      {ss: 'ds'},
      {ss: 'ds'},
      {ss: 'ds'},
      {ss: 'ds'},
      {ss: 'ds'},
      {ss: 'ds'},
      {ss: 'ds'},
      {ss: 'ds'},
      {ss: 'ds'}
            // { id: '1', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '2', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '3', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '4', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '5', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '6', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '7', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '8', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '9', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' },
            // { id: '10', tit: '晨兴资本刘芹做企业不仅要务实，还要学会务虚', author: '王某某', content: '本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......' }
      ]
    }
  },
  mounted: function () {
    var that = this
    var isL = true
    window.onscroll = function () {
      var hei = document.body.clientHeight - document.body.scrollTop - window.screen.availHeight
      if (hei <= 5 && hei >= -5 && isL === true) {
        isL = false
        setTimeout(function () {
          for (var i = 0; i < 10; i++) {
            that.items.push({ new: '1' })
            if (i === 9) {
              isL = true
            }
          }
        }, 500)
      }
      // console.log(document.body.scrollTop)
      // console.log(document.body.clientHeight)
    }
  },
  methods: {
    // timer: undefind,
    addNews: function () {
      var that = this
      // that.timer = setInterval(function () {
      that.items.push({ new: '1' })
      // }, 1000)
    }
  }
}

</script>

<style>
*{@font-face:Microsoft YaHei; font-family: Microsoft YaHei!important}
html{overflow-x: hidden;}
#app { font-family: 'Avenir', Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale; text-align: center; color: #2c3e50;  margin-top: 5px;}

.news-title{text-align: left!important; padding: 10px; margin: 0;line-height: 1.4}
.author{text-align: left;padding: 2px 10px}
.author span{padding: 3px;border-radius: 3px;font-size: 12px}
.author-item{background: #80b3e0;color: #ffffff}
a{color: #828282!important}
.classification{background:#bdbdbd;color: #fb8115}
.time{text-align: right;}
.times{background:#777777;color: #ffffff}
.content-wrap{padding: 10px;}
.content{color: #828282;text-align: left}
.logo-img{width: 100%;border-radius: 5px;background: #cccccc}
.my-border{border-bottom: 1px solid #cccccc;clear: both;position:relative;left: 15px;top: 10px}
#loader{border: none;}
</style>
