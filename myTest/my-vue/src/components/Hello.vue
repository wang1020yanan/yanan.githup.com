<template>
  <div class="hello">
    <div class="row">
      <div class="col-xs-12">
        <h4 class="news-title"><b>{{msg2}}晨兴资本刘芹：做企业不仅要务实，还要学会务虚</b></h4>
        <div class="row author">
          <div class="col-xs-3"><span class="author-item">王某某</span></div>
          <div class="col-xs-3"><span class="classification">投资人</span></div>
          <div class="col-xs-6 time"><span class="times">10月18日 13:00</span></div>
        </div>
        <div class="row content-wrap">
          <div class="col-xs-8 content"><div class="content-item"><a href="http://36kr.com/p/5054699.html">本文来源于晨星资本，作为晨星资本创始合伙人、董事总经理刘芹。36克经授权发布。在过去的几年里晨星资本创始合......</a></div></div>
          <div class="col-xs-4 img-wrap"><img class="logo-img" src="../assets/logo.png"></div>
          <div class="my-border"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'hello',
  data () {
    return {
      msg: 'Welcome to Yo4ur Vue.js App',
      msg2: 'Welcome to Yo4ur Vue.js App'

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {font-weight: normal;}
.news-title{text-align: left!important; padding: 10px; margin: 0;line-height: 1.4}
.author{text-align: left;padding: 2px 10px}
.author span{padding: 3px;border-radius: 3px;font-size: 12px}
.author-item{background: #80b3e0;color: #ffffff}
 a{color: #828282}
.classification{background:#bdbdbd;color: #fb8115}
.time{text-align: right;}
.times{background:#777777;color: #ffffff}
.content-wrap{padding: 10px;}
.content{color: #828282;text-align: left}
.logo-img{width: 100%;border-radius: 5px;background: #cccccc}
.my-border{border-bottom: 1px solid #cccccc;clear: both;position:relative;left: 15px;top: 10px}



ul { list-style-type: none;padding: 0;}
li { display: inline-block; margin: 0 10px;}

</style>
