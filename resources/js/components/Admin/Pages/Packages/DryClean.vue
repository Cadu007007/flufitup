<template>
  <div class="DryClean">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>

    <div class="flex-column">
        <Dry-Clean-Item 
        v-for="(item,index) in loadedItems" :key="index"
            :label="item.label"
            :price="item.price"
            @delete-item="deleteItem(index)"
        />
    </div>

    <p class="add-new-item" @click="addNewItemContainer()">Add Another Dry Clean Item</p>
    
  </div>
</template>

<script>
import DryCleanItem from './Components/DryCleanItem'
export default {
    data() {
        return {
            loadedItems: this.items
        }
    },
    props: ['title','date','items'],
    components:{
        DryCleanItem
    },
    methods: {
        addNewItemContainer(){
            this.loadedItems.push({label: '', price:''})
        },
        deleteItem(index){
            this.loadedItems.splice(index,1)
        }
    }    

}
</script>

<style lang="scss">
$text-grey: #00000066;
$orange: #FFA800;

.DryClean{
    width: 100%;
    height: 100%;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
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
}
</style>