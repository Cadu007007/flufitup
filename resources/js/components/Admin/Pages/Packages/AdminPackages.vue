<template>
  <div class="AdminPackages">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
    <div class="flex-container">
        <div class="flex-column">
            <div class="packages-type adhoc-packages" v-if="addhoc.length > 0">
                <div class="">
                    <p class="packages-type-title">Ad Hoc Packages</p>
                    <div class="flex-row" v-if="addhoc">
                        <PackageUsersCard
                        
                            v-for="aPackage in addhoc"
                            :key="aPackage.id"
                            :id="aPackage.id"
                            :name="aPackage.name"
                            :showpackageroute="showpackageroute"
                        />
                    </div>
                </div>
            </div>
            <div class="packages-type biweekly-packages" v-if="biweekly.length > 0">
                <p class="packages-type-title">Biweekly Packages</p>
                    <div class="flex-row">
                        <PackageUsersCard
                            v-for="aPackage in biweekly"
                            :key="aPackage.id"
                            :id="aPackage.id"
                            :name="aPackage.name"
                            :showpackageroute="showpackageroute"

                        />
                    </div>
            </div>
            <div class="packages-type monthly-packages" v-if="monthly.length > 0">
                <p class="packages-type-title">Monthly Packages</p>
                <div class="flex-row">

                    <PackageUsersCard
                        v-for="aPackage in monthly"
                        :key="aPackage.id"
                        :id="aPackage.id"
                        :name="aPackage.name"
                        :showpackageroute="showpackageroute"
                    />
                </div>
            </div>
            <div class="packages-type tailored-packages" v-if="tailoredpackages">
                <p class="packages-type-title">Tailored Packages</p>
                    <div class="flex-row">
                        <PackageUsersCard
                            v-for="aPackage in tailoredpackages"
                            :key="aPackage.id"
                            :id="aPackage.id"
                            :name="aPackage.name"
                            :showpackageroute="edittailoredpackageroute"

                        />
                        <!-- Add new tailored package -->
                        <div class="add-new-tailored" @click="goToCreateTailoredPackage()">
                            Add New
                        </div>
                    </div>
                </div>
        </div>

    </div>
        <img src="/images/admin/icons/zones-add-icon.svg" @click="goToAddPackage" alt="" class="add-package">
  </div>
</template>

<script>
import PackageUsersCard from "./Components/PackageUsersCard";
export default {
    components: {
        PackageUsersCard
    },
    props: [
        "title",
        "date",
        "adhocpackages",
        "biweeklypackages",
        "monthlypackages",
        "tailoredpackages",
        "addpackageroute",
        "showpackageroute",
        "addtailoredpackageroute",
        "edittailoredpackageroute"
    ],
    data() {
        return {
            activepackageid: 0,
            packageusers: [],
            addhoc: this.adhocpackages || [' '],
            biweekly: this.biweeklypackages || [' '],
            monthly: this.monthlypackages || [' '],
        };
    },
    methods: {
        goToAddPackage(){
            window.location.href = this.addpackageroute
        },
        goToCreateTailoredPackage(){
            window.location.href= this.addtailoredpackageroute
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;

.AdminPackages{
    width: 100%;
    height: 100%;
    .page-header{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        .title{
            margin: 26px 0 0 0;
            font-size: 21px;
            font-family: 'Open-Sans-SemiBold';
        }
        .date{
            font-size: 12px;
            color: $text-grey;
            font-family: 'Open-Sans-Regular';
        }

    }


    .flex-container {
        width: 100%;
        margin: 10px auto;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: flex-start;
        .flex-column{
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;

        .packages-type {
            .flex-row{
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: center;
            }
            .packages-type-title {
                font-family: "Open-Sans-Bold";
                font-size: 16px;
                margin: 22px 0 22px 0;
                }
            }

        }

        .packages-users-card {
            width: 444px;
            height: fit-content;
            box-shadow: 0px 0px 6px #0000001a;
            border: 2px solid #e8ecf3;
            margin-left: 200px;
            padding: 16px 24px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            max-height: 450px;
            overflow-y: auto;
            margin-top: 52px;;
            /* position: fixed;
            right: 150px; */
            .user-container {
                width: 100%;
                height: 40px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                font-size: 15px;
                font-family: "Open-Sans-Regular";
                color: $text-grey;
                border-bottom: 1px solid #eef2f4;
                .card-title {
                    font-family: "Open-Sans-Regular";
                    color: $text-grey;
                    height: 30px;
                    padding-bottom: 5px;
                }
                .username {
                    font-size: 13px;
                    font-family: "Open-Sans-Bold";
                    color: $blue;
                    cursor: pointer;
                    height: 35px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    justify-content: center;
                }
            }
        }
    }
    .add-package{
        position: fixed;
        bottom: 20px;
        right: 30px;
        cursor: pointer;
    }
    /* Add new tailored package card */
    .add-new-tailored{
    width: 200px;
    height: 150px;
    margin: 12px 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    color: $black;
    box-shadow: 0px 0px 3px #0000001A;
    border-radius: 20px;
    border: 1px solid #ddd;
    cursor: pointer;
    color: orange;
    font-weight: bold;
    &.active-card{
    color: $blue !important;
    border: 1px solid $blue;
    }
    
}
}
</style>