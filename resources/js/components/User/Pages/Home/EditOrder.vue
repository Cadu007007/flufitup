<template>
<div class="EditOrder">

  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

<div class="page-container">
  <WeekPickupsContainer 
  class="WeekPickupsContainer"
  title="Week One"

  :activepickups="weekonepickupone[0].pickup_one_state + weekonepickuptwo[0].pickup_two_state"
  :pickuponestate="weekonepickupone[0].pickup_one_state"
  :pickuptwostate="weekonepickuptwo[0].pickup_two_state"
  

:pickuponeday="weekonepickupone[0].pickup_one_day"
:pickuponedate="weekonepickupone[0].pickup_one_date"
:pickuponetime="weekonepickupone[0].pickup_one_time"
:pickuponevolume="weekonepickupone[0].pickup_one_volume"
:pickuponenubmerofbags="weekonepickupone[0].pickup_one_nubmer_of_bags"
:pickuponedrycleanincluded="weekonepickupone[0].pickup_one_dry_clean_included"
:pickuptwoday="weekonepickuptwo[0].pickup_two_day"
:pickuptwodate="weekonepickuptwo[0].pickup_two_date"
:pickuptwotime="weekonepickuptwo[0].pickup_two_time"
:pickuptwovolume="weekonepickuptwo[0].pickup_two_volume"
:pickuptwonubmerofbags="weekonepickuptwo[0].pickup_two_nubmer_of_bags"
:pickuptwodrycleanincluded="weekonepickuptwo[0].pickup_two_dry_clean_included"
/>

  <WeekPickupsContainer 
  class="WeekPickupsContainer"
  title="Week Two"
  :activepickups="weektwopickupone[0].pickup_one_state + weektwopickuptwo[0].pickup_two_state"
  :pickuponestate="weektwopickupone[0].pickup_one_state"
  :pickuptwostate="weektwopickuptwo[0].pickup_two_state"
  
:pickuponeday="weektwopickupone[0].pickup_one_day"
:pickuponedate="weektwopickupone[0].pickup_one_date"
:pickuponetime="weektwopickupone[0].pickup_one_time"
:pickuponevolume="weektwopickupone[0].pickup_one_volume"
:pickuponenubmerofbags="weektwopickupone[0].pickup_one_nubmer_of_bags"
:pickuponedrycleanincluded="weektwopickupone[0].pickup_one_dry_clean_included"
:pickuptwoday="weektwopickuptwo[0].pickup_two_day"
:pickuptwodate="weektwopickuptwo[0].pickup_two_date"
:pickuptwotime="weektwopickuptwo[0].pickup_two_time"
:pickuptwovolume="weektwopickuptwo[0].pickup_two_volume"
:pickuptwonubmerofbags="weektwopickuptwo[0].pickup_two_nubmer_of_bags"
:pickuptwodrycleanincluded="weektwopickuptwo[0].pickup_two_dry_clean_included"

  />


  <WeekPickupsContainer 
  class="WeekPickupsContainer"
  title="Week Three"
  
  :activepickups="weekthreepickupone[0].pickup_one_state + weekthreepickuptwo[0].pickup_two_state"
  :pickuponestate="weekthreepickupone[0].pickup_one_state"
  :pickuptwostate="weekthreepickuptwo[0].pickup_two_state"

  
:pickuponeday="weekthreepickupone[0].pickup_one_day"
:pickuponedate="weekthreepickupone[0].pickup_one_date"
:pickuponetime="weekthreepickupone[0].pickup_one_time"
:pickuponevolume="weekthreepickupone[0].pickup_one_volume"
:pickuponenubmerofbags="weekthreepickupone[0].pickup_one_nubmer_of_bags"
:pickuponedrycleanincluded="weekthreepickupone[0].pickup_one_dry_clean_included"
:pickuptwoday="weekthreepickuptwo[0].pickup_two_day"
:pickuptwodate="weekthreepickuptwo[0].pickup_two_date"
:pickuptwotime="weekthreepickuptwo[0].pickup_two_time"
:pickuptwovolume="weekthreepickuptwo[0].pickup_two_volume"
:pickuptwonubmerofbags="weekthreepickuptwo[0].pickup_two_nubmer_of_bags"
:pickuptwodrycleanincluded="weekthreepickuptwo[0].pickup_two_dry_clean_included"

  />


  <WeekPickupsContainer 
  class="WeekPickupsContainer"
  title="Week Four"

  
  :activepickups="weekfourpickupone[0].pickup_one_state + weekfourpickuptwo[0].pickup_two_state"
  :pickuponestate="weekfourpickupone[0].pickup_one_state"
  :pickuptwostate="weekfourpickuptwo[0].pickup_two_state"

  
:pickuponeday="weekfourpickupone[0].pickup_one_day"
:pickuponedate="weekfourpickupone[0].pickup_one_date"
:pickuponetime="weekfourpickupone[0].pickup_one_time"
:pickuponevolume="weekfourpickupone[0].pickup_one_volume"
:pickuponenubmerofbags="weekfourpickupone[0].pickup_one_nubmer_of_bags"
:pickuponedrycleanincluded="weekfourpickupone[0].pickup_one_dry_clean_included"
:pickuptwoday="weekfourpickuptwo[0].pickup_two_day"
:pickuptwodate="weekfourpickuptwo[0].pickup_two_date"
:pickuptwotime="weekfourpickuptwo[0].pickup_two_time"
:pickuptwovolume="weekfourpickuptwo[0].pickup_two_volume"
:pickuptwonubmerofbags="weekfourpickuptwo[0].pickup_two_nubmer_of_bags"
:pickuptwodrycleanincluded="weekfourpickuptwo[0].pickup_two_dry_clean_included"

/>
</div>


</div>
</template>



<script>
import WeekPickupsContainer from './Components/WeekPickupsContainer';

export default {
  data() {
    return {
      title: 'Edit Order',
    }
  },
  props: {
    date: String,
    weekonepickupone: Array,
    weekonepickuptwo: Array,
    weektwopickupone: Array,
    weektwopickuptwo: Array,
    weekthreepickupone: Array,
    weekthreepickuptwo: Array,
    weekfourpickupone: Array,
    weekfourpickuptwo: Array,
  },
  components:{
    WeekPickupsContainer
  }

}
</script>

<style lang="scss">
$text-grey: #00000066;

.EditOrder{
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

  .page-container{
    display: grid;
    grid-template-columns: repeat(2,1fr);
    justify-content: center;
    align-items: center;
    .WeekPickupsContainer{
      width: 460px;
      margin: 20px;
    }
  }
}
</style>

