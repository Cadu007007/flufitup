<template>
<div class="Home">
  <div class="page-header">
    <p class="title">{{title}}</p>
  </div>
</div>
</template>

<style lang="scss">
.page-header{

  .title{
    margin: 10px;
    font-size: 14px;
  font-weight: bold;
  }

}
</style>
<script>
export default {
  data() {
    return {
      title: 'Home'
    }
  },

}
</script>
