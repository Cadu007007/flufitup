<template>
  <div class="AdminPackages">  
    <div class="page-header">
        <p class="title">{{title}}</p>
        <p class="date">{{date}}</p>
    </div>
    <div class="flex-container">
        <div class="flex-column">
            <div class="packages-type adhoc-packages">
                <div class="">
                    <p class="packages-type-title">Ad Hoc Packages</p>
                    <div class="flex-row">
                        <PackageUsersCard
                            v-for="aPackage in adhocpackages"
                            :key="aPackage.id"
                            :id="aPackage.id"
                            :name="aPackage.name"
                            :count="aPackage.users"
                        />
                    </div>
                </div>
            </div>
            <div class="packages-type biweekly-packages">
                <p class="packages-type-title">Biweekly Packages</p>
                    <div class="flex-row">
                        <PackageUsersCard
                            v-for="aPackage in biweeklypackages"
                            :key="aPackage.id"
                            :id="aPackage.id"
                            :name="aPackage.name"
                            :count="aPackage.users"
                            
                        />
                    </div>
            </div>
            <div class="packages-type monthly-packages">
                <p class="packages-type-title">Monthly Packages</p>
                <div class="flex-row">

                    <PackageUsersCard
                        v-for="aPackage in monthlypackages"
                        :key="aPackage.id"
                        :id="aPackage.id"
                        :name="aPackage.name"
                        :count="aPackage.users"
                        
                    />
                </div>
            </div>
            <div class="packages-type tailored-packages">
                <p class="packages-type-title">Tailored Packages</p>
                    <div class="flex-row">
                        <PackageUsersCard
                            v-for="aPackage in tailoredpackages"
                            :key="aPackage.id"
                            :id="aPackage.id"
                            :name="aPackage.name"
                            :count="aPackage.users"
                            
                        />
                    </div>
                </div>
        </div>

    </div>
        <img src="/images/admin/icons/zones-add-icon.svg" @click="goToAddPackage" alt="" class="add-package">
  </div>
</template>

<script>
import PackageUsersCard from "../../Components/PackageUsersCard";
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
    ],
    data() {
        return {
            activepackageid: 0,
            packageusers: []
        };
    },
    methods: {
        goToAddPackage(){
            window.location.href = this.addpackageroute
        },
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
}
</style>