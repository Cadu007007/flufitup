<template>
    <div class="AddedValueContainer">
        <div class="package-title-div">
            <p class="title">Added Value Service</p>
            <input
                class="package-name"
                type="text"
                name="name"
                id=""
                placeholder="Added Value"
                v-model="newAddedName"
                @keyup.enter="addNewAddedValue"
                @keydown="hideHint"
            />
            <p class="hint" hidden>Already found</p>
        </div>
        <div class="added-values">
            <div class="added-value" v-for="(value,index) in addedvalues" :key="index">
                <input type="checkbox" class="checkbox">
                <p class="name">{{value.name}}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['values'],
     data(){
        return{
            newAddedName: '',
            addedvalues: this.values
        }
    },
    methods:{
        addNewAddedValue(){ 
            let isFound;
            if (this.newAddedName.length > 0 ) {
                /* check if already found */
                this.addedvalues.forEach((item,index) => {
                    if (this.newAddedName === item.name){
                        isFound = true
                        /* show hint */
                        $('.hint').removeAttr('hidden')
                        return;
                    }
                })
                if (!isFound){
                    this.addedvalues.push({name: this.newAddedName})
                    this.newAddedName = ''
                }
                
            } 
        },
        hideHint(){
            $('.hint').attr('hidden',true)
        }
    }
};
</script>

<style lang="scss">
$blue: #22AEE4;
.AddedValueContainer {
    .added-values{
        display: grid;
        grid-template-columns: repeat(3,1fr);
        
        .added-value{
            display: flex;
            flex-direction: row;
            margin: 5px 0;
            .checkbox{
                margin-right: 10px;
            }
            .name{
                font-size: 15px;
            }
        }
    }
    .hint{
        font-size: 12px;
        margin: 0 0 10px 10px;
        color: #d43535;
        font-weight: bold;
    }
}
</style>
