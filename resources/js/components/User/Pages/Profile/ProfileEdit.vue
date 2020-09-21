<template>
<div class="ProfileEdit">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

<form :action="formactionroute" method="post">
<div class="edit-profile-form-container">
  <div class="form-input-container">
    <input type="hidden" :value="csrf" name="_token"/>
    <Smart-Input-Container 
    title="Email"
    name="email"
    placeholder="Enter Your Email"
    type="text"
    />
    
     <Smart-Input-Container 
    title="Phone Number"
    name="phone"
    placeholder="( XXX ) - XXX - XXXX"
    type="text"
    />

  </div>
  
  <!-- Pickup -->
  <AddressInputsContainer 
  title="Pickup"
  addressTypeName="pickup_address_type"
  residentialTypeName="pickup_residential_type"
  streetAddressName="pickup_street"
  cityName="pickup_city"
  stateName="pickup_state"
  zipCodeName="pickup_zip_code"
  unitNumberName="pickup_unit_number"
  buildingNumberName="pickup_building_number"
  gateCodeName="pickup_gate_code"
  />

  <div class="drop-off-hint"   v-if="!showdDropOffAddress">
    <p class="hint">If Drop off Address is different from Pick up Address</p>
    <p class="show-dropoff" @click="showdDropOffAddress = !showdDropOffAddress">Add Drop off Address</p>
  </div>

  <AddressInputsContainer 
  v-if="showdDropOffAddress"
  title="Drop off"
  addressTypeName="drop_off_address_type"
  residentialTypeName="drop_off_residential_type"
  streetAddressName="drop_off_street"
  cityName="drop_off_city"
  stateName="drop_off_state"
  zipCodeName="drop_off_zip_code"
  unitNumberName="drop_off_unit_number"
  buildingNumberName="drop_off_building_number"
  gateCodeName="drop_off_gate_code"
  />
  
  <div class="form-input-container">
     <Smart-Input-Container 
    title="Date of Birth"
    name="birthday"
    placeholder="MM / DD / YYYY"
    type="date"
    />
  </div>

  </div>
  <div class="button-container">
      <button type="submit" class="action-button">Save</button>
  </div>
  </form>
</div>

</template>


<script>
import SmartInputContainer from '../../Components/SmartInputContainer'
import AddressInputsContainer from '../../Components/AddressInputsContainer'

export default {
  data() {
    return {
      title: 'Edit Profile',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      showdDropOffAddress: false
    }
  },
  props: ['date','formactionroute'],
  components:{
    SmartInputContainer,
    AddressInputsContainer
  }


}
</script>
<style lang="scss">
$text-grey: #00000066;
$blue: #22AEE4;
$white: #ffffff;



.ProfileEdit{
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

.edit-profile-form-container{
  width: 100%;
    .form-input-container{
      width: 444px;
    }

    .drop-off-hint{
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-bottom: 36px;
      .hint{
      color: $text-grey;
      font-size: 14px;

      }
    .show-dropoff{
      font-size: 16px;
      font-family: 'Lato-Bold';
      color: $blue;
    cursor: pointer;
    }
  }
  
}

.button-container{
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
      margin-bottom: 36px;

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

