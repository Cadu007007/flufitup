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
          :openstate="true"
          :hasradio="true"
          class="accordion"
          title="Choose your Service"
          name="service"
          @option-selected="changeServiceName"
          :options="serviceoptions"
          />

          <Accordion
          class="accordion"
          :hasradio="true"
          @option-selected="changeServiceName(value)"
          :title="selectedServiceName"
          name="wash_and_fold_service"
          :options="washoptions"
          />

          <Accordion
          class="accordion"
          :hasradio="true"
          title="Choose how many pickeups per week"
          name="pickups_per_week"
          :options="pickupsoptions"
          @option-selected="pickupsSelected"
          />

          <Accordion
          class="accordion"
          :hasradio="true"
          title="Choose your Load Size per Pickup"
          name="load_size_per_pickup"
          :options="loadoptions"
          @option-selected="loadSizeSelected"
          />

          <!-- showbagesinput -->
          <div class="more-bages" v-if="showbagesinput">
              <p class="label">Please specify</p>
              <input class="more-bages-input" type="number" step="any"  name="more_bages" min="4" max="10" value="4">
          </div>

          <Accordion-Calendar
          :pickups="pickups"
          class="accordion"
          :hasradio="false"
          title="Choose your date"
          :options="dateoptions"
          />

          <Accordion
          class="accordion"
          :hasradio="true"
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


        <div class="question-container">
            <p class="question">Add Nature friendly garment Freshener ( Only for 1.5s per bag )</p>
          <div class="answers">
              <div class="answer">
                  <input class="radio" type="radio" name="add_nature_garment" value="yes" id="">
                  <label class="option-label" for="add_nature_garment">Yes</label>
              </div>
              <div class="answer">
                  <input class="radio" type="radio" checked name="add_nature_garment" value="no" id="">
                  <label class="option-label" for="add_nature_garment">No</label>
              </div>
          </div>

        </div>

        <DryCleanAccordion
          class="accordion"
          title="Add Dry Clean Items"
          name="dry_clean"
          :items="drycleanitems"
          />


        <HouseholdAccordion
          class="accordion"
          title="Add Household Items"
          name="household"
          :items="householditems"
          />


        <!-- detergents items -->
            <div class="slider-container" style="width: 500px">
                <div class="title font-weight-bold my-4 text-center text-primary">Detergents</div>
                <Slider :perpage ="2" :types="detergentstypes" :typesitems="detergentstypesitems" />
            </div>
        <!-- fabric items -->
            <div class="slider-container" style="width: 500px">
                <div class="title font-weight-bold my-4 text-center text-primary">Fabric Softener</div>
                <Slider :perpage ="2" :types="fabrictypes" :typesitems="fabrictypesitems" />
            </div>
        <!-- dryer items -->
            <div class="slider-container" style="width: 500px">
                <div class="title font-weight-bold my-4 text-center text-primary">Dryer Sheet</div>
                <Slider :perpage ="2" :types="dryertypes" :typesitems="dryertypesitems" />
            </div>
        <!-- booster items -->
            <div class="slider-container" style="width: 500px">
                <div class="title font-weight-bold my-4 text-center text-primary">Scent Booster</div>
                <Slider :perpage ="2" :types="boostertypes" :typesitems="boostertypesitems" />
            </div>
      </div>


    <PackageCreatePriceCard
      class="package-price"
      price="50"
      currency="$"
      style="width: 300px !important; position: fixed; left: 900px"
      @card-button-clicked="goToSummary"
     />

  </div>
</form>
</div>

</template>


<script>
import Accordion from './Components/Accordion'
import AccordionCalendar from './Components/AccordionCalendar'
import AddedValuesAccordion from './Components/AddedValuesAccordion'
import DryCleanAccordion from './Components/DryCleanAccordion'
import HouseholdAccordion from './Components/HouseholdAccordion'
import PackageCreatePriceCard from './Components/PackageCreatePriceCard'
import Slider from "./Components/Slider";
import ItemsList from "./Components/ItemsList";


export default {
  data() {
    return {
      title: 'Package Create',
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
      showaddedvalueschoices: false,
      selectedServiceName: 'Choose your Wash and Fold Service',
      showbagesinput: false,
      pickups: 1,
    }
  },
  props: ['date','serviceoptions','washoptions','pickupsoptions','loadoptions','dateoptions',
          'returndurationoptions','addedvalueoptions','addedvaluechoices','formactionroute',
          "drycleanitems",
          "householditems",
        "detergentstypes",
        "detergentstypesitems",
        "fabrictypes",
        "fabrictypesitems",
        "dryertypes",
        "dryertypesitems",
        "boostertypes",
        "boostertypesitems",
        "summaryroute",],
  components:{
    Accordion,
    AccordionCalendar,
    AddedValuesAccordion,
    DryCleanAccordion,
    HouseholdAccordion,
    PackageCreatePriceCard,
    Slider,
    ItemsList
  },
  methods: {
    showAddedValues(){
      this.showaddedvalueschoices = !this.showaddedvalueschoices
      alert(this.showaddedvalueschoices)
    },
    addedValuesClicked(){
      alert('Added values')
    },
    changeServiceName(option){
      this.selectedServiceName = 'Choose your ' + option.title + `${ option.title.includes('Service') ? '' : ' Service'}`
    },
    loadSizeSelected(option){
      if(option.value == 'more'){
        // show specify hint
        this.showbagesinput = true;
      } else {
        this.showbagesinput = false;

      }
    },
    pickupsSelected(option){
      if(option.value == 2 ){
        this.pickups = 2 
      } else {
        this.pickups = 1 
      }
    },
    goToSummary() {
        // var url = this.summaryroute.replace(
        //     "package_id",
        //     this.package[0].id
        // );
        var url = this.summaryroute
        window.location.href = url;
    },
  },
}
</script>
<style lang="scss">
$text-grey: #00000066;
$black: #000000;


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

      .more-bages{
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin: 3px 0 20px 0;
        .label{
          margin-left: 24px;
        }
        .more-bages-input{
          margin-left: 30px;
          height: 40px;
          text-align: center;
          font-size: 14px;
          font-weight: bold;
          box-shadow: 0px 0px 10px #0000001A;
          border-radius: 10px;
        }
      }

      .question-container{
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: flex-start;
    width: 520px;
    margin: 40px 0;
    .question{
        font-size: 18px;
        font-family: 'Lato-Bold';
        color: $black;
    }
    .answers{
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
        .answer{
            width: 80px;
            margin-top: 12px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            .option-label{
                margin-left: 10px;
            }
            .radio{
                width: 24px;
                height: 24px;
            }
        }
    }
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
      position: relative;
    }
}

}
</style>

