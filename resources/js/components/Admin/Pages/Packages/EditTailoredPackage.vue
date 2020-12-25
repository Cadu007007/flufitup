<template>
  <div class="CreateTailoredPackage">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>

    <div class="flex-column">
        <Tailored-Package-Question v-for="(item,index) in loadedquestions" :key="index"
        :question="item.question"
        :choices="item.choices"
        />
    </div>

    <p class="add-new-item" @click="addNewItemContainer()">Add Another Question</p>
    
    <div class="button-container">
        <button class="save-button">Save</button>
    </div>
  </div>
</template>

<script>
import TailoredPackageQuestion from './Components/TailoredPackageQuestion'
export default {
    data() {
        return {
            loadedquestions: this.questions,
        }
    },
    props: ['title','date','questions'],
    components:{
        TailoredPackageQuestion
    },
    methods: {
        addNewItemContainer(){
            this.loadedquestions.push({question: '', choices:[{}]})
        },
    }    

}
</script>

<style lang="scss">
$text-grey: #00000066;
$orange: #FFA800;
$blue: #22aee4;

.CreateTailoredPackage{
    width: 100%;
    height: 100%;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-questions: center;
        .title{
            margin: 26px 0;
            font-size: 21px;
            font-family: 'Open-Sans-SemiBold';
        }
        .date{
            font-size: 12px;
            color: $text-grey;
            font-family: 'Open-Sans-Regular';
        }

    }
    .add-new-item{
        width: fit-content;
        margin: 30px auto;
        text-align: center;
        color: $orange;
        font-family: 'Open-Sans-Bold';
        font-size: 14px;
    }

    .button-container{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 30px auto;
        .save-button{
            margin: 30px auto;
            padding: 10px 40px;
            height: 45px;
            border-radius: 25px;
            background: $blue;
            color: #fff;
            font-size: 18px;
        }
    }
}
</style>