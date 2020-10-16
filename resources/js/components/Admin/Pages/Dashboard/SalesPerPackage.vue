<template>
    <div class="SalesPerPackage">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <div class="flex-container">
            <div class="flex-column">
                <div class="packages-type adhoc-packages">
                    <div class="">
                        <p class="packages-type-title">Ad Hoc Packages</p>
                        <PackageUsersCard
                            v-for="aPackage in adhocpackages"
                            :key="aPackage.id"
                            :id="aPackage.id"
                            :name="aPackage.name"
                            :count="getPackageUsersCount(0, aPackage.id)"
                            @show-package-users="
                                loadActivePackageUsers(0,aPackage.id)
                            "
                        />
                    </div>
                </div>
                <div class="packages-type biweekly-packages">
                    <p class="packages-type-title">Biweekly Packages</p>
                    <PackageUsersCard
                        v-for="aPackage in biweeklypackages"
                        :key="aPackage.id"
                        :id="aPackage.id"
                        :name="aPackage.name"
                        :count="getPackageUsersCount(1,aPackage.id)"
                        @show-package-users="
                            loadActivePackageUsers(1,aPackage.id)
                        "
                    />
                </div>
                <div class="packages-type monthly-packages">
                    <p class="packages-type-title">Monthly Packages</p>
                    <PackageUsersCard
                        v-for="aPackage in monthlypackages"
                        :key="aPackage.id"
                        :id="aPackage.id"
                        :name="aPackage.name"
                        :count="getPackageUsersCount(2,aPackage.id)"
                        @show-package-users="
                            loadActivePackageUsers(2,aPackage.id)
                        "
                    />
                </div>
                <div class="packages-type tailored-packages">
                    <p class="packages-type-title">Tailored Packages</p>
                    <PackageUsersCard
                        v-for="aPackage in tailoredpackages"
                        :key="aPackage.id"
                        :id="aPackage.id"
                        :name="aPackage.name"
                        :count="getPackageUsersCount(3,aPackage.id)"
                        @show-package-users="
                            loadActivePackageUsers(3,aPackage.id)
                        "
                    />
                </div>
            </div>

            <div class="packages-users-card" v-if="packageusers.length">
                <div class="user-container">
                    <p class="card-title">Username</p>
                </div>
                <div
                    class="user-container"
                    v-for="user in packageusers"
                    :key="user.id"
                >
                    <p class="username" @click="goToShowUser(user.id)">
                        {{ user.name }}
                    </p>
                </div>
            </div>
        </div>
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
        "users",
        "showuserroute"
    ],
    data() {
        return {
            activepackageid: 0,
            packageusers: []
        };
    },
    methods: {
        getPackageUsersCount(packageType, packageId) {
            var packages = []
            switch(packageType){
            case 0:
                packages = this.adhocpackages;
            break;
            case 1:
                packages = this.biweeklypackages;
            break;
            case 2:
                packages = this.monthlypackages;
            break;
            case 3:
                packages = this.tailoredpackages;
            break;
            }
             
            var users = this.users;
            var count = 0;
            for (
                var index = 0;
                index < packages.length;
                index++
            ) {
                users.forEach(function(user, index) {
                    if (user.package_id == packageId) {
                        count++;
                    }
                });
                return count;
            }
        },
        loadActivePackageUsers(packageType,clickedPackageId) {
            this.activepackageid = clickedPackageId;
            var packages = []
            switch(packageType){
            case 0:
                packages = this.adhocpackages;
            break;
            case 1:
                packages = this.biweeklypackages;
            break;
            case 2:
                packages = this.monthlypackages;
            break;
            case 3:
                packages = this.tailoredpackages;
            break;
            }
             
            var users = this.users;
            var packageUsersArray = [];
            // get users of the package
            for (var index = 0; index < packages.length; index++) {
                users.forEach(function(user, index) {
                    if (user.package_id == clickedPackageId) {
                        if (packageUsersArray.indexOf(user) == -1) {
                            packageUsersArray.push(user);
                        }
                    }
                });
            }

            this.packageusers = packageUsersArray;
            var cards = document.getElementsByClassName("PackageUserscard")
            
            for(var index=0; index < cards.length; index++){
                cards[index].classList.remove('active-card')
            }
            document.getElementById(clickedPackageId).classList.add('active-card')
            

        },
        goToShowUser(id) {
            var url = this.showuserroute.replace("user_id", id);
            window.location.href = url;
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;

.SalesPerPackage {
    width: 100%;
    height: 100%;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0 10px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
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
}
</style>
