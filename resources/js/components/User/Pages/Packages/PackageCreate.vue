<template>
<div class="PackageSummary">
  <div class="page-header">
    <p class="title">{{title}}</p>
    <p class="date">{{date}}</p>
  </div>

<form :action="formactionroute" method="post">
  <input type="hidden" :value="csrf" name="_token"/>
  <div class="page-container">
      <div class="options-container">
          <Accordion
          :isopen="true"
          class="accordion"
          title="Choose your Service"
          name="service"
          :options="serviceoptions"
          />

          <Accordion
          class="accordion"
          title="Choose your Wash and Fold Service"
          name="wash_and_fold_service"
          :options="washoptions"
          />

          <Accordion
          class="accordion"
          title="Choose how many pickeups per week"
          name="pickups_per_week"
          :options="pickupsoptions"
          />

          <Accordion
          class="accordion"
          title="Choose your Load Size per Pickup"
          name="load_size_per_pickup"
          :options="loadoptions"
          />

          <Accordion
          class="accordion"
          title="Choose your date"
          name="date"
          :options="dateoptions"
          />

          <Accordion
          class="accordion"
          title="Choose Service return Duration"
          name="return_duration"
          :options="returndurationoptions"
          />

          <AddedValuesAccordion
          class="accordion"
          title="Choose your Add Value Service"
          name="added_value"
          :options="addedvalueoptions"
          :addedvaluechoices="addedvaluechoices"
          />


      </div>


    <PackageCreatePriceCard
      class="package-price"
      price="50"
      currency="$"
     />

  </div>
</form>
</div>

</template>


<script>
import Accordion from './Components/Accordion'
import AddedValuesAccordion from './Components/AddedValuesAccordion'
import PackageCreatePriceCard from './Components/PackageCreatePriceCard'
export default {
  data() {
    return {
      title: 'Package Create',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      showaddedvalueschoices: false,
    }
  },
  props: ['date','serviceoptions','washoptions','pickupsoptions','loadoptions','dateoptions',
          'returndurationoptions','addedvalueoptions','addedvaluechoices','formactionroute'],
  components:{
    Accordion,
    AddedValuesAccordion,
    PackageCreatePriceCard
  },
  methods: {
    showAddedValues(){
      this.showaddedvalueschoices = !this.showaddedvalueschoices
      alert(this.showaddedvalueschoices)
    },
    addedValuesClicked(){
      alert('Added values')
    }
  },
}
</script>
<style lang="scss">
$text-grey: #00000066;


.PackageSummary{
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
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    .options-container{
      width: 444px;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: flex-start;
      flex-wrap: wrap;
      .accordion{
        margin: 12px 0;
      }
    }

    .added-values-container{
      width: 100%;
      display: grid;
      grid-template-columns: repeat(3,1fr);
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      .added-value{
        height: 40px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        .input{

        }
        .label{
          font-size: 12px;
          margin-left: 12px;
        }
      }

    }
    .package-price{
      margin-left: 10px;
    }
}

}
</style>

