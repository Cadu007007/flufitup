<template>
<div class="Home">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

<WelcomePanner 
  title="Welcome, Mohamed" 
  description="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"
  vector="/images/login-vector.svg" />

<NoOrdersPanner text="No Active Orders Yet" />
</div>


</template>

<style lang="scss">
$text-grey: #00000066;


.Home{
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

.NoOrdersPanner{
    margin-top: 36px;

}
}
</style>

<script>
import WelcomePanner from '../WelcomePanner';
import NoOrdersPanner from '../NoOrdersPanner';

export default {
  data() {
    return {
      title: 'Home'
    }
  },
  props: ['date'],
  components:{
    WelcomePanner,
    NoOrdersPanner
  }

}
</script>
