<template>
<div class="ProfileChangePassword">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

  <form :action="formactionroute" method="post">
<div class="change-password-form-container">
  <input type="hidden" :value="csrf" name="_token"/>

    <Smart-Input-Container 
    title="Old Password"
    name="old_password"
    placeholder="Old Password"
    type="password"
    />
    
     <Smart-Input-Container 
    title="New Password"
    name="new_password"
    placeholder="New Password"
    type="password"
    />
    <Smart-Input-Container 
    title="Re-enter New Password"
    name="confirm_new_password"
    placeholder="Re-enter New Password"
    type="password"
    />

</div>

  <div class="button-container">
      <button type="submit" class="action-button">Change</button>
  </div>
  </form>
</div>

</template>


<script>
import SmartInputContainer from '../../Components/SmartInputContainer'

export default {
  data() {
    return {
      title: 'Change Password',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  },
  props: ['date','formactionroute'],
  components:{
    SmartInputContainer
  }


}
</script>
<style lang="scss">
$text-grey: #00000066;
$blue: #22AEE4;
$white: #ffffff;

.ProfileChangePassword{
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

.change-password-form-container{
  width: 444px;
}
.button-container{
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  .action-button{
    width: 200px;
    height: 40px;
    background: $blue;
    border-radius: 35px;
    font-size: 18px;
    color: $white;
  }
}
}
</style>

