<template>
<div class="Chat">
  <div class="page-header">
    <p class="title">{{title}}</p>
  </div>
</div>
</template>
<script>

export default {
  data() {
    return {
      title: 'Chat'
    }
  },
}
</script>
<style lang="scss">
$text-grey: #00000066;


.Chat{
  padding: 0 140px 0 16px;
.page-header{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  .title{
  margin: 26px 0;
  font-size: 12px;
  font-weight: bold;
  }


}

}
</style>

