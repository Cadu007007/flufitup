<template>
<div class="OldOrderDetails">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

</div>

</template>


<script>
export default {
  data() {
    return {
      title: 'Old Order Details'
    }
  },
  props: ['date']


}
</script>
<style lang="scss">
$text-grey: #00000066;


.OldOrderDetails{
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
    .date{
    font-size: 10px;
    color: $text-grey;
  }

}

}
</style>

