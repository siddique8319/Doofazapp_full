
import DesignationEntry from './components/DesignationEntry.vue';
import MemberEntry from './components/MemberEntry.vue';
import IncentiveEntry from './components/IncentiveEntry.vue';
import FixedSalary from './components/FixedSalary.vue';
import SalaryComponent from './components/SalaryComponent.vue';
import SalaryComponentInformation from './components/SalaryComponentInformation.vue';
import IncomeType from './components/IncomeType.vue';
import MemberType from './components/MemberType.vue';
import DesignationCondition from './components/DesignationCondition.vue';
import GenerationEntry from './components/GenerationEntry.vue';
import AddMenu from './components/AddMenu.vue';
import MenuPermission from './components/MenuPermission.vue';
import SubMenu from './components/SubMenu.vue';
import PermissionSubMenu from './components/PermissionSubMenu.vue';
import Income from './components/Income.vue';
import Offer from './components/Offer.vue';
import Software from './components/Software.vue';
import ShopList from './components/ShopList.vue';
import ShopTypeCondition from './components/ShopTypeCondition.vue';
import MyJoining from './components/UserComponents/MyJoining.vue';
import NewMemberEntry from './components/UserComponents/NewMemberEntry.vue';
import MyGeneration from './components/UserComponents/MyGeneration.vue';
import MyGenerationTree from './components/UserComponents/MyGenerationTree.vue';
import NewShopEntry from './components/UserComponents/NewShopEntry.vue';
import MonthlySalary from './components/UserComponents/MonthlySalary.vue';
import PaidSalaryList from './components/UserComponents/PaidSalaryList.vue';
import DueSalaryList from './components/UserComponents/DueSalaryList.vue';
import MonthlyIncentiveList from './components/UserComponents/MonthlyIncentiveList.vue';
import SalesComission from './components/UserComponents/SalesComission.vue';
import MonthlyComission from './components/UserComponents/MonthlyComission.vue';
import BalanceSheet from './components/UserComponents/BalanceSheet.vue';
import ReceiveBalance from './components/UserComponents/ReceiveBalance.vue';
import WithdrawBalance from './components/UserComponents/WithdrawBalance.vue';
import BalanceTransfer from './components/UserComponents/BalanceTransfer.vue';
import PendingShopList from './components/UserComponents/PendingShopList.vue';
import ApproveShopList from './components/UserComponents/ApproveShopList.vue';
import ShopCancelList from './components/UserComponents/ShopCancelList.vue';
import DesignationList from './components/UserComponents/DesignationList.vue';
import DirectSalesList from './components/UserComponents/DirectSalesList.vue';
import DownlineSalesList from './components/UserComponents/DownlineSalesList.vue';
import DownlineAchiverList from './components/UserComponents/DownlineAchiverList.vue';
import SetTransectionPin from './components/UserComponents/SetTransectionPin.vue';
import ChangePassword from './components/UserComponents/ChangePassword.vue';
import SendMessage from './components/SendMessage.vue';
import ProjectType from './components/ProjectType.vue';
import Project from './components/Project.vue';
import Logo from './components/Logo.vue';
import LoginImage from './components/LoginImage.vue';
import BannerImage from './components/BannerImage.vue';
import MonthlyShopList from './components/MonthlyShopList.vue';
import NewMessage from './components/UserComponents/NewMessage.vue';
import ReadMessage from './components/UserComponents/ReadMessage.vue';
import MessageDetails from './components/UserComponents/MessageDetails.vue';
import EditMemberEntry from './components/EditComponents/EditMemberEntry.vue';
import EditMenu from './components/EditComponents/EditMenu.vue';
import EditDesignation from './components/EditComponents/EditDesignation.vue';
import EditDesignationCondition from './components/EditComponents/EditDesignationCondition.vue';
import EditIncentiveEntry from './components/EditComponents/EditIncentiveEntry.vue';
import EditFixedSalaryEntry from './components/EditComponents/EditFixedSalaryEntry.vue';
import EditPermissionMenu from './components/EditComponents/EditPermissionMenu.vue';
import EditSalaryComponent from './components/EditComponents/EditSalaryComponent.vue';
import EditSalaryComponentInformation from './components/EditComponents/EditSalaryComponentInformation.vue';
import EditIncomeType from './components/EditComponents/EditIncomeType.vue';
import EditSubMenu from './components/EditComponents/EditSubMenu.vue';
import EditIncome from './components/EditComponents/EditIncome.vue';
import MoreGenerationTree from './components/UserComponents/MoreGenerationTree.vue';
import EditOffer from './components/EditComponents/EditOffer.vue';
import EditSoftware from './components/EditComponents/EditSoftware.vue';
import EditProjectType from './components/EditComponents/EditProjectType.vue';
import EditShopTypeCondition from './components/EditComponents/EditShopTypeCondition.vue';
import EditProject from './components/EditComponents/EditProject.vue';
export const routes = [
 {    name: 'designation',
      path: '/designation-entry',
      component: DesignationEntry,
      meta: { hideDashboard: true }
  },
  {   name: 'memberEntry',
      path: '/memberEntry',
      component: MemberEntry,
      meta: { hideDashboard: true }
  },
  {   name: 'newMember',
      path: '/newMember',
      component: NewMemberEntry,
      meta: { hideDashboard: true }
  },
  {   name: 'incentiveEntry',
      path: '/incentiveEntry',
      component: IncentiveEntry,
      meta: { hideDashboard: true }
  },
   {  name: 'fixedSalary',
      path: '/fixedSalary',
      component: FixedSalary,
      meta: { hideDashboard: true }
  },
  {  name: 'salaryComponent',
     path: '/salaryComponent',
     component: SalaryComponent,
     meta: { hideDashboard: true }
  },
  {  name: 'salaryComponentInformation',
     path: '/salaryComponentInformation',
     component: SalaryComponentInformation,
     meta: { hideDashboard: true }
  },
  {  name: 'incomeType',
     path: '/incomeType',
     component: IncomeType,
     meta: { hideDashboard: true }
  },
  {  name: 'income',
     path: '/income',
     component: Income,
     meta: { hideDashboard: true }
  },
  {  name: 'memberType',
     path: '/memberType',
     component: MemberType,
     meta: { hideDashboard: true }
  },
  {  name: 'designationCondition',
     path: '/designationCondition',
     component: DesignationCondition,
     meta: { hideDashboard: true }
  },
  {  name: 'generationEntry',
     path: '/generationEntry',
     component: GenerationEntry,
     meta: { hideDashboard: true }
  },
  {  name: 'addMenu',
     path: '/addMenu',
     component: AddMenu,
     meta: { hideDashboard: true }
  },
  {  name: 'menuPermission',
     path: '/menuPermission',
     component: MenuPermission,
     meta: { hideDashboard: true }
  },
  {  name: 'subMenu',
     path: '/subMenu',
     component: SubMenu,
     meta: { hideDashboard: true }
  },
  {  name: 'permissionSubMenu',
     path: '/permissionSubMenu',
     component: PermissionSubMenu,
     meta: { hideDashboard: true }
  },
  {  name: 'myJoining',
     path: '/myJoining',
     component: MyJoining,
     meta: { hideDashboard: true }
   },
   {  name: 'myGeneration',
     path: '/myGeneration',
     component: MyGeneration,
     meta: { hideDashboard: true }
   },
   {  name: 'myGenerationTree',
      path: '/myGenerationTree',
      component: MyGenerationTree,
      meta: { hideDashboard: true }
   },
   {  name: 'offer',
      path: '/offer',
      component: Offer,
      meta: { hideDashboard: true }
   },
   {  name: 'software',
      path: '/software',
      component: Software,
      meta: { hideDashboard: true }
  },
  {   name: 'shopTypeCondition',
      path: '/shopTypeCondition',
      component: ShopTypeCondition,
      meta: { hideDashboard: true }
  },
  {   name: 'newShopEntry',
      path: '/newShopEntry',
      component: NewShopEntry,
      meta: { hideDashboard: true }
  },
  {   name: 'shopList',
      path: '/shopList',
      component: ShopList,
      meta: { hideDashboard: true }
  },
  {   name: 'monthlyShopList',
      path: '/monthlyShopList',
      component: MonthlyShopList,
      meta: { hideDashboard: true }
  },
  {   name: 'monthlySalary',
      path: '/monthlySalary',
      component: MonthlySalary,
      meta: { hideDashboard: true }
  },
  {   name: 'paidSalaryList',
      path: '/paidSalaryList',
      component: PaidSalaryList,
      meta: { hideDashboard: true }
  },
  {   name: 'dueSalaryList',
      path: '/dueSalaryList',
      component: DueSalaryList,
      meta: { hideDashboard: true }
  },
  {   name: 'monthlyIncentiveList',
      path: '/monthlyIncentiveList',
      component: MonthlyIncentiveList,
      meta: { hideDashboard: true }
  },
  {   name: 'salesComission',
      path: '/salesComission',
      component: SalesComission,
      meta: { hideDashboard: true }
  },
  {   name: 'monthlyComission',
      path: '/monthlyComission',
      component: MonthlyComission,
      meta: { hideDashboard: true }
  },
  {   name: 'balanceSheet',
      path: '/balanceSheet',
      component: BalanceSheet,
      meta: { hideDashboard: true }
  },
  {   name: 'receiveBalance',
      path: '/receiveBalance',
      component: ReceiveBalance,
      meta: { hideDashboard: true }
  },
  {   name: 'withdrawBalance',
      path: '/withdrawBalance',
      component: WithdrawBalance,
      meta: { hideDashboard: true }
  },
  {   name: 'balanceTransfer',
      path: '/balanceTransfer',
      component: BalanceTransfer,
      meta: { hideDashboard: true }
  },
  {   name: 'pendingShopList',
      path: '/pendingShopList',
      component: PendingShopList,
      meta: { hideDashboard: true }
  },
  {    name: 'approveShopList',
       path: '/approveShopList',
       component: ApproveShopList,
       meta: { hideDashboard: true }
 },
 {     name: 'shopCancelList',
       path: '/shopCancelList',
       component: ShopCancelList,
       meta: { hideDashboard: true }
 },
 {     name: 'designationList',
       path: '/designationList',
       component: DesignationList,
       meta: { hideDashboard: true }
 },
 {     name: 'directSalesList',
       path: '/directSalesList',
       component: DirectSalesList,
       meta: { hideDashboard: true }
 },
 {     name: 'downlineSalesList',
       path: '/downlineSalesList',
       component: DownlineSalesList,
       meta: { hideDashboard: true }
 },
 {     name: 'downlineAchiverList',
       path: '/downlineAchiverList',
       component: DownlineAchiverList,
       meta: { hideDashboard: true }
 },
 {     name: 'setTransectionPin',
       path: '/setTransectionPin',
       component: SetTransectionPin,
       meta: { hideDashboard: true }
 },
 {     name: 'changePassword',
       path: '/changePassword',
       component: ChangePassword,
       meta: { hideDashboard: true }
 },
 {     name: 'sendMessage',
       path: '/sendMessage',
       component: SendMessage,
       meta: { hideDashboard: true }
 },
 {     name: 'newMessage',
       path: '/newMessage',
       component: NewMessage,
       meta: { hideDashboard: true }
 },
 {     name: 'readMessage',
       path: '/readMessage',
      component: ReadMessage,
      meta: { hideDashboard: true }
},
 {     name: 'messageDetails',
       path: '/messageDetails/:id',
       component: MessageDetails,
       meta: { hideDashboard: true }
  },
  {    name: 'projectType',
       path: '/projectType',
       component: ProjectType,
       meta: { hideDashboard: true }
  },
  {    name: 'project',
       path: '/project',
       component: Project,
       meta: { hideDashboard: true }
 },
 {     name: 'logo',
       path: '/logo',
       component: Logo,
       meta: { hideDashboard: true }
 },
 {     name: 'loginImage',
       path: '/loginImage',
       component: LoginImage,
       meta: { hideDashboard: true }
},
{      name: 'bannerImage',
       path: '/bannerImage',
       component: BannerImage,
       meta: { hideDashboard: true }
},
  {  name: 'editIncomeType',
     path: '/editIncomeType',
     component: EditIncomeType,
     meta: { hideDashboard: true }
  },
  {  name: 'editProject',
     path: '/editProject/:id',
     component: EditProject,
     meta: { hideDashboard: true }
},
  {  name: 'editProjectType',
     path: '/editProjectType',
     component: EditProjectType,
     meta: { hideDashboard: true }
  },
  {   name: 'editMemberEntry',
      path: '/editMemberEntry/:id',
      component: EditMemberEntry,
      meta: { hideDashboard: true }
  },
  {   name: 'editMenu',
      path: '/editMenu/:id',
      component: EditMenu,
      meta: { hideDashboard: true }
  },
  {   name: 'editDesignation',
      path: '/editDesignation/:id',
      component: EditDesignation,
      meta: { hideDashboard: true }
  },
  {   name: 'editDesignationCondition',
      path: '/editDesignationCondition/:id',
      component: EditDesignationCondition,
      meta: { hideDashboard: true }
  },
  {   name: 'editPermissionMenu',
      path: '/editPermissionMenu/:id',
      component: EditPermissionMenu,
      meta: { hideDashboard: true }
  },
  {   name: 'editIncentiveEntry',
      path: '/editIncentiveEntry/:id',
      component: EditIncentiveEntry,
      meta: { hideDashboard: true }
   },
   {   name: 'editFixedSalaryEntry',
       path: '/editFixedSalaryEntry/:id',
       component: EditFixedSalaryEntry,
       meta: { hideDashboard: true }
      
    },
    { 
     name: 'editSalaryComponent',
     path: '/editSalaryComponent',
     component: EditSalaryComponent,
     meta: { hideDashboard: true }
  },
  { 
   name: 'editSalaryComponentInformation',
   path: '/editSalaryComponentInformation',
   component: EditSalaryComponentInformation,
   meta: { hideDashboard: true }
},
 {   name: 'editSubMenu',
     path: '/editSubMenu',
     component: EditSubMenu,
     meta: { hideDashboard: true }
  },
  { 
  name: 'editIncome',
  path: '/editIncome',
  component: EditIncome,
  meta: { hideDashboard: true }
 },
 { 
   name: 'editOffer',
   path: '/editOffer/:id',
   component: EditOffer,
   meta: { hideDashboard: true }
  },
  { 
   name: 'editSoftware',
   path: '/editSoftware/:id',
   component: EditSoftware,
   meta: { hideDashboard: true }
  },
  { 
   name: 'editSoftware',
   path: '/editSoftware/:id',
   component: EditSoftware,
   meta: { hideDashboard: true }
  },
{ 
   name: 'moreGenerationTree',
   path: '/moreGenerationTree/:id',
   component: MoreGenerationTree,
   meta: { hideDashboard: true }
 },
 { 
   name: 'editShopTypeCondition',
   path: '/editShopTypeCondition/:id',
   component: EditShopTypeCondition,
   meta: { hideDashboard: true }
 },
 

];
