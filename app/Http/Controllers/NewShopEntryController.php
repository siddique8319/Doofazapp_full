<?php

namespace App\Http\Controllers;
use App\NewShopEntry;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Division;
use App\District;
use App\Upazila;
use App\Union;
use Auth;
use App\AccountInformation;
use App\Income;
use App\User;
use App\NewMemberEntry;
use App\Generation;
use App\FlashSale;
use App\DesignationCondition;
use App\DesignationUserCondition;
use App\Designation;
use App\AccountHistory;
class NewShopEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shop=NewShopEntry::where('createdBy',Auth::user()->id)->get();
        return ['shop'=>$shop];  
    }
    public function shopList()
    {
        $shop=NewShopEntry::get();
        return ['shop'=>$shop];
    }
    public function division()
    {
        $division=Division::get();
        return ['division'=>$division];
    }
    public function district($id)
    {
        $district=District::where('division_id',$id)->get();
        return ['district'=>$district];
    }
    public function allDistrict()
    {
        $allDistrict=District::get();
        return ['allDistrict'=>$allDistrict];
    }
    public function allThana()
    {
        $allThana=Upazila::get();
        return ['allThana'=>$allThana];
    }
    public function thana($id)
    {
        $thana=Upazila::where('district_id',$id)->get();
        return ['thana'=>$thana];
    }
    public function union($id)
    {
        $union=Union::where('upazilla_id',$id)->get();
        return ['union'=>$union];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $shop=NewShopEntry::where('status',2)->get();
      return ['shop'=>$shop];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
                    NewShopEntry::insert([
                        'shopName' => $request->shopName,
                        'ownerName' => $request->ownerName,
                        'ownerMobile' => $request->ownerMobile,
                        'representative' => $request->representative,
                        'representativeMobile' => $request->representativeMobile,
                        'businessEmail' => $request->businessEmail,
                        'businessType' => $request->businessType,
                        'marketName' => $request->marketName,
                        'shopNo' => $request->shopNo,
                        'password' => $request->password,
                        'shopFront' => $request->shopFront,
                        'shopBehind' => $request->shopBehind,
                        'shopLeft' => $request->shopLeft,
                        'shopRight' => $request->shopRight,
                        'divisionId' => $request->divisionId,
                        'districtId' => $request->districtId,
                        'thanaId' => $request->thanaId,
                        'unionId' => $request->unionId,
                        'address' => $request->address,
                        'createdBy' => Auth::user()->id,
                        'created_at' => Carbon::now(),
                       
                    ]);

                

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
       NewShopEntry::where('shopId',$id)->update(['status'=>1 ]);
        /**Direct Sale*/           
       $income=Income::where('incomeTypeId',1)
       ->where('id', 1)
       ->get();
       foreach($income as $incomes){        
       $shop=NewShopEntry::where('shopId',$id)->get();       
       foreach($shop as $shops){
        $getPreviousAmount=AccountInformation::where('customerId',$shops->createdBy)
        ->Where('salesType', 1 )
        ->Where('incomeType', 1)
        ->get('balance');
       foreach($getPreviousAmount as $getPrevious){                           
       $getPreviousTotal=$getPrevious->balance+$incomes->amount;
       }         
       AccountInformation::where('customerId',$shops->createdBy)
       ->Where('salesType', 1 )
       ->Where('incomeType', 1)
       ->update(['balance' => $getPreviousTotal,]);
       AccountHistory::insert([
         'salesType' =>1,
         'incomeType' =>1,
         'shopId' =>$id,
         'customerId' =>$shops->createdBy,
         'created_at' => Carbon::now(),
         'balance' =>$incomes->amount,]);
       /**End Direct Sale*/
       /**Direct Sale Sponsor*/   
       $get=User::where('id',$shops->createdBy)->get();
       $incomeResponse=Income::where('incomeTypeId',1)
       ->Where('id', 2)
       ->get();
       foreach($incomeResponse as $incomeResponses){                  
       $balance=$incomeResponses->amount;
       foreach($get as $gets){
       AccountInformation::where('customerId',$gets->joined_by)
       ->where('salesType', 2 )
       ->Where('incomeType', 1)
       ->update(['balance' => $balance,]);
       AccountHistory::insert([
        'salesType' =>2,
        'incomeType' =>1,
        'shopId' =>$id,
        'customerId' =>$gets->joined_by,
        'created_at' => Carbon::now(),
        'balance' =>$incomeResponses->amount]);
       if($gets->joined_by==NULL){
        $blanc=FlashSale::where('salesType', 2)
         ->Where('incomeType', 1)
         ->Where('salesType', 2)
         ->get('balance'); 
        foreach($blanc as $blcs){
        $totalResult=$blcs->balance+$balance;
        }    
        FlashSale::where('salesType', 2 )
       ->Where('incomeType', 1)
       ->update(['balance' => $totalResult,]);    
       }
        /**End Direct Sale Sponsor*/ 
        /**Generation*/     
       $member =NewMemberEntry::where('upLine','!=',NULL)->where('downLine',$gets->joined_by)->get();
       $count =NewMemberEntry::where('upLine','!=',NULL)->where('downLine',$gets->joined_by)->count();            
       $distributeAmount=0;                              
       for( $i=1; $i<=$count; $i++ ){                
       $generation = Generation::where('generationStep', $i)->get();                    
       foreach($generation as $generations){
       $balance=$generations->generationAmount;   
       $memberr =NewMemberEntry::where('upLine','!=',NULL)->where('downLine',$gets->joined_by)->where('level',$i)->get();  
       foreach($memberr as $memberrs){ 
       $mem=$memberrs->upLine;                                                
       $bla=AccountInformation::where('customerId',$mem)                                                                                    ->where('salesType', 3)
       ->Where('incomeType', 1)
       ->Where('salesType', 3)
       ->get('balance'); 
       foreach($bla as $bl){
        $total=$bl->balance+$balance;
        }
        }                
        foreach($memberr as $memberrs){ 
        $mem=$memberrs->upLine;                                                
        AccountInformation::where('customerId',$mem)                                                                                    ->where('salesType', 3)
        ->Where('incomeType', 1)
        ->Where('salesType', 3)
        ->update(['balance' => $total]); 
        AccountHistory::insert([
          'salesType' =>3,
          'incomeType' =>1,
          'shopId' =>$id,
          'customerId' =>$mem,
          'created_at' => Carbon::now(),
          'balance' =>$balance]);
        }  
       }
       $distributeAmount +=$balance;
       }   
       /**End Generation*/ 
       /**Flash Sale Generation*/     
       $incomeFlashSale=Income::where('incomeTypeId',1)
       ->Where('id', 3)
        ->get();  
        foreach($incomeFlashSale as $incomeFlashSales){                  
        $balance=$incomeFlashSales->amount;
        if($distributeAmount< $balance){
         $totalBalance=$balance-$distributeAmount;
         $blan=FlashSale::where('salesType', 3)
         ->Where('incomeType', 1)
         ->Where('salesType', 3)
         ->get('balance'); 
        foreach($blan as $blc){
        $totalAmount=$blc->balance+$totalBalance;
        }
        FlashSale::Where('incomeType', 1)
        ->Where('salesType', 3)
        ->update(['balance' => $totalAmount]); 
         }
        }  
        /**End Flash Sale Generation*/ 
         /**Daily  Sale Royalty*/ 
         $designationCount= User::where('designation','!=', 1)->count();
         $incomeDailySaleRoyalty=Income::where('incomeTypeId',1)
         ->Where('id', 4)
         ->get('amount'); 
         foreach($incomeDailySaleRoyalty as $dailySale){
             if($designationCount!=0)  {  
         $totalDailySaleRoyalty=$dailySale->amount/$designationCount; 
             }
         }
         $userDesignation= User::where('designation','!=', 1)->get();      
         foreach($userDesignation as $userDesignations){
          $getPreviousAmountRoylty=AccountInformation::where('customerId',$userDesignations->id)
          ->Where('salesType', 4 )
          ->Where('incomeType', 1)
          ->get();          
         foreach($getPreviousAmountRoylty as $getPreviousRoylts){                           
         $getPreviousRoyltyTotal=$getPreviousRoylts->balance+$totalDailySaleRoyalty;
         
        AccountInformation::where('customerId',$userDesignations->id)
        ->Where('salesType', 4 )
        ->Where('incomeType', 1)
        ->update(['balance' => $getPreviousRoyltyTotal]);
        AccountHistory::insert([
          'salesType' =>4,
          'shopId' =>$id,
          'incomeType' =>1,
          'customerId' =>$userDesignations->id,
          'created_at' => Carbon::now(),
          'balance' =>$totalDailySaleRoyalty]);
        }
    }
         /**End Daily  Sale Royalty*/ 
         /**Daily  Sale Designation*/ 
         $countGetDesignation=Designation::where('designationId','!=',1)->count();
         $getDailySaleDesignation=Income::where('incomeTypeId',1)
         ->where('id', 5)
         ->get('amount'); 
         foreach($getDailySaleDesignation as $dailySaleDesignation){
         $calculate=$dailySaleDesignation->amount/$countGetDesignation;          
         }
         $getAllDesignation=Designation::where('designationId','!=',1)->get();
         $getAllDesignationCount=User::where('designation','!=',1)->count();
         $flashSaleDesignation=Income::where('incomeTypeId',1)
          ->where('id', 5)
         ->get('amount'); 
         foreach($flashSaleDesignation as $flashSaleDesignations){
          if($getAllDesignationCount!=0)  {         
         $calculateFlashSaleDesignation=$flashSaleDesignations->amount/ $getAllDesignationCount;  
         $calculateFlashSaleDesignationDaily=$flashSaleDesignations->amount-$calculateFlashSaleDesignation;        
         $balanceFlashSale=FlashSale::
         Where('salesType', 5 )
         ->Where('incomeType', 1)
         ->get('balance'); 
        foreach($balanceFlashSale as $balanceFlashSales){
        $totalFlashSaleDesignation=$balanceFlashSales->balance+$calculateFlashSaleDesignationDaily;
        
        FlashSale:: Where('salesType', 5 )
        ->Where('incomeType', 1)
        ->update(['balance' => $totalFlashSaleDesignation]); 
           }  } 
         foreach($getAllDesignation as $alldesignations){
           $userDesignationCount=User::where('designation',$alldesignations->designationId)->count();
           if($userDesignationCount!=0){
           $lastAmount=$calculate/$userDesignationCount;   }
           
           $userDesignationDaily=User::where('designation',$alldesignations->designationId)->get();
          foreach($userDesignationDaily as $userDailyDesignations) {
            $amountDesignation=AccountInformation::where('customerId',$userDailyDesignations->id)
            ->Where('salesType', 5 )
            ->Where('incomeType', 1)
            ->get();          
           foreach($amountDesignation as $amountDesignations){                           
           $calculateAmount=$amountDesignations->balance+$lastAmount;           
          AccountInformation::where('customerId',$userDailyDesignations->id)
          ->Where('salesType', 5 )
          ->Where('incomeType', 1)
          ->update(['balance' =>  $calculateAmount]);
          AccountHistory::insert([
          'salesType' =>5,
          'incomeType' =>1,
          'shopId' =>$id,
          'customerId' =>$userDailyDesignations->id,
          'created_at' => Carbon::now(),
          'balance' =>$lastAmount]);
        
          }  
          }
         }}
         /**Daily  Sale Designation*/
         /**Daily Top 10 Saller*/
         $topTenCount=DesignationUserCondition::orderBy('sales' ,'DESC')->limit(10)->count();
         $topTenSaller=Income::where('incomeTypeId',1)
         ->where('id', 6)
         ->get('amount'); 
         foreach($topTenSaller as $topTenSallers){
         $calculateTopTen=$topTenSallers->amount/$topTenCount;
         }
         $topTen=DesignationUserCondition::orderby('sales','DESC')->limit(10)->get();
         foreach($topTen as $topTens){
          $getPreviousTopTen=AccountInformation::where('customerId',$topTens->id)
          ->Where('salesType', 6)
          ->Where('incomeType', 1)
          ->get();          
         foreach($getPreviousTopTen as $getPreviousTopTens){                           
         $getPreviousTopTenTotal=$getPreviousTopTens->balance+$calculateTopTen;
         
        AccountInformation::where('customerId',$topTens->id)
        ->Where('salesType', 6 )
        ->Where('incomeType', 1)
        ->update(['balance' => $getPreviousTopTenTotal]); 
        AccountHistory::insert([
          'salesType' =>6,
          'incomeType' =>1,
          'shopId' =>$id,
          'customerId' =>$topTens->id,
          'created_at' => Carbon::now(),
          'balance' => $calculateTopTen]);
         
         }}
         /**End Daily Top 10 Saller*/
       } 
     }
   }
   /** Designation Update*/
   $take=NewShopEntry::where('shopId',$id)->count();
   $sumSale=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
   for($i=1;$i<=$take;$i++){
   foreach($sumSale as $sumSales) {
   $sumSaleTotal=$sumSales->sales+$i;    
   DesignationUserCondition::where('customerId',$shops->createdBy)->update([
   'sales' => $sumSaleTotal]);
    }}
   $generationUser=NewMemberEntry::where('upLine',$shops->createdBy)->get();
   $downline=NewMemberEntry::where('downLine',$shops->createdBy)->get();    
   foreach($generationUser as $generationUsers){    
   $generation = User::where('id',$generationUsers->downLine)->get(); 
    foreach($generation as $user){
    $rt= NewShopEntry::where('shopId',$id)->count();
    for($x=1;$x<$rt;$x++){
    DesignationUserCondition::insert([
   'customerId'=> $shops->createdBy, 
    'teamSales' => 2]);}
    } 
 } 
  foreach($downline as $lines) {
  $geta = User::where('id',$lines->upLine)->get();   
  foreach($geta as $gt){
  $rrt= NewShopEntry::where('shopId',$id)->count();
  $sum=DesignationUserCondition::where('customerId',$gt->id)->get();
   for($y=1;$y<=$rrt;$y++){
   foreach($sum as $sums) {
   $sumTotal=$sums->teamSales+$y;  
  DesignationUserCondition::where('customerId',$gt->id)->update([      
    'teamSales' => $sumTotal]);}
    }
   }
  }   
    /** Designation Update For Active Member*/
    $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',1)->count();
    $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
    $condition = DesignationCondition::where('designationId',2)->get();
    foreach($condition as $conditions){  
    foreach($userCondition as $userConditions){    
       if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
      User::where('id',$shops->createdBy)->update(
            ['designation' => 2]
        );  
        }
       }
       }  
  $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
  foreach($down as $liness) {
    $gett = User::where('id',$liness->upLine)->get();
    foreach($gett as $gtt){ 
   $designationUser=User::where('joined_by',$gtt->id)->where('designation',1)->count();
   $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
   $condition = DesignationCondition::where('designationId',2)->get();
   foreach($condition as $conditions){  
   foreach($userCondition as $userConditions){    
      if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
     User::where('id',$gtt->id)->update(
           ['designation' => 2]
       );  
       }
      }
      }
     
    }
  }
   /**End Designation Active Member*/
   /** Designation Update For Gold Member*/
   $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',2)->count();
   $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
   $condition = DesignationCondition::where('designationId',3)->get();
   foreach($condition as $conditions){  
   foreach($userCondition as $userConditions){    
      if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
     User::where('id',$shops->createdBy)->update(
           ['designation' => 3]
       );  
       }
      }
      }  
 $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
 foreach($down as $liness) {
   $gett = User::where('id',$liness->upLine)->get();
   foreach($gett as $gtt){ 
  $designationUser=User::where('joined_by',$gtt->id)->where('designation',2)->count();
  $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
  $condition = DesignationCondition::where('designationId',3)->get();
  foreach($condition as $conditions){  
  foreach($userCondition as $userConditions){    
     if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
    User::where('id',$gtt->id)->update(
          ['designation' => 3]
      );  
      }
     }
     }    
   }
 }
  /** End Designation Update For Gold Member*/
   /** Designation Update For Sales Promotional Officer (SPO)*/
   $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',3)->count();
   $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
   $condition = DesignationCondition::where('designationId',4)->get();
   foreach($condition as $conditions){  
   foreach($userCondition as $userConditions){    
      if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
     User::where('id',$shops->createdBy)->update(
           ['designation' => 4]
       );  
       }
      }
      }  
 $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
 foreach($down as $liness) {
   $gett = User::where('id',$liness->upLine)->get();
   foreach($gett as $gtt){ 
  $designationUser=User::where('joined_by',$gtt->id)->where('designation',3)->count();
  $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
  $condition = DesignationCondition::where('designationId',4)->get();
  foreach($condition as $conditions){  
  foreach($userCondition as $userConditions){    
     if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
    User::where('id',$gtt->id)->update(
          ['designation' => 4]
      );  
      }
     }
     }
    
   }
 }
  /** End Designation Update For Sales Promotional Officer (SPO)*/
   /** Designation Update For Regional Sales Manager(RSM)*/
   $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',4)->count();
   $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
   $condition = DesignationCondition::where('designationId',5)->get();
   foreach($condition as $conditions){  
   foreach($userCondition as $userConditions){    
      if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
     User::where('id',$shops->createdBy)->update(
           ['designation' => 5]
       );  
       }
      }
      }  
 $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
 foreach($down as $liness) {
   $gett = User::where('id',$liness->upLine)->get();
   foreach($gett as $gtt){ 
  $designationUser=User::where('joined_by',$gtt->id)->where('designation',4)->count();
  $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
  $condition = DesignationCondition::where('designationId',5)->get();
  foreach($condition as $conditions){  
  foreach($userCondition as $userConditions){    
     if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
    User::where('id',$gtt->id)->update(
          ['designation' => 5]
      );  
      }
     }
     }
    
   }
 }
  /** End Designation Update For Regional Sales Manager(RSM)*/
  /** Designation Update For Assistant Sales Manager (ASM))*/
  $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',5)->count();
  $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
  $condition = DesignationCondition::where('designationId',6)->get();
  foreach($condition as $conditions){  
  foreach($userCondition as $userConditions){    
     if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
    User::where('id',$shops->createdBy)->update(
          ['designation' => 6]
      );  
      }
     }
     }  
$down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
foreach($down as $liness) {
  $gett = User::where('id',$liness->upLine)->get();
  foreach($gett as $gtt){ 
 $designationUser=User::where('joined_by',$gtt->id)->where('designation',5)->count();
 $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
 $condition = DesignationCondition::where('designationId',6)->get();
 foreach($condition as $conditions){  
 foreach($userCondition as $userConditions){    
    if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
   User::where('id',$gtt->id)->update(
         ['designation' => 6]
     );  
     }
    }
    }
   
  }
}
 /** End Designation Update For Assistant Sales Manager (ASM)*/
 /** Designation Update For Assistant (General Manager Sales) AGM*/
 $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',6)->count();
 $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
 $condition = DesignationCondition::where('designationId',7)->get();
 foreach($condition as $conditions){  
 foreach($userCondition as $userConditions){    
    if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
   User::where('id',$shops->createdBy)->update(
         ['designation' => 7]
     );  
     }
    }
    }  
$down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
foreach($down as $liness) {
 $gett = User::where('id',$liness->upLine)->get();
 foreach($gett as $gtt){ 
$designationUser=User::where('joined_by',$gtt->id)->where('designation',6)->count();
$userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
$condition = DesignationCondition::where('designationId',7)->get();
foreach($condition as $conditions){  
foreach($userCondition as $userConditions){    
   if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
  User::where('id',$gtt->id)->update(
        ['designation' => 7]
    );  
    }
   }
   }
  
 }
}
/** End Designation Update For Assistant (General Manager Sales) AGM*/
/** Designation Update For Sales & Marketing(General Manager) SM*/
$designationUser=User::where('joined_by',$shops->createdBy)->where('designation',7)->count();
$userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
$condition = DesignationCondition::where('designationId',8)->get();
foreach($condition as $conditions){  
foreach($userCondition as $userConditions){    
   if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
  User::where('id',$shops->createdBy)->update(
        ['designation' => 8]
    );  
    }
   }
   }  
$down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
foreach($down as $liness) {
$gett = User::where('id',$liness->upLine)->get();
foreach($gett as $gtt){ 
$designationUser=User::where('joined_by',$gtt->id)->where('designation',7)->count();
$userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
$condition = DesignationCondition::where('designationId',8)->get();
foreach($condition as $conditions){  
foreach($userCondition as $userConditions){    
  if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
 User::where('id',$gtt->id)->update(
       ['designation' => 8]
   );  
   }
  }
  }
 
}
}
/** End Designation Update For Sales & Marketing(General Manager) SM*/
 }
}
public function monthlyShopApprove($id)
{ 
   NewShopEntry::where('shopId',$id)->update(['status'=>3 ,
     'created_at' => Carbon::now()]);
    /**Direct Sale*/           
   $income=Income::where('incomeTypeId',2)
   ->where('id', 7)
   ->get();
   foreach($income as $incomes){        
   $shop=NewShopEntry::where('shopId',$id)->get();       
   foreach($shop as $shops){
    $getPreviousAmount=AccountInformation::where('customerId',$shops->createdBy)
    ->Where('salesType', 7)
    ->Where('incomeType', 2)
    ->get('balance');
   foreach($getPreviousAmount as $getPrevious){                           
   $getPreviousTotal=$getPrevious->balance+$incomes->amount;
   }         
   AccountInformation::where('customerId',$shops->createdBy)
   ->Where('salesType', 7)
   ->Where('incomeType', 2)
   ->update(['balance' => $getPreviousTotal,]);
   AccountHistory::insert([
     'salesType' =>7,
     'incomeType' =>2,
     'shopId' =>$id,
     'customerId' =>$shops->createdBy,
     'created_at' => Carbon::now(),
     'balance' =>$incomes->amount,]);
   /**End Direct Sale*/
   /**Direct Sale Sponsor*/   
   $get=User::where('id',$shops->createdBy)->get();
   $incomeResponse=Income::where('incomeTypeId',2)
   ->Where('id', 8)
   ->get();
   foreach($incomeResponse as $incomeResponses){                  
   $balance=$incomeResponses->amount;
   foreach($get as $gets){
   AccountInformation::where('customerId',$gets->joined_by)
   ->where('salesType', 8 )
   ->Where('incomeType', 2)
   ->update(['balance' => $balance,]);
   $final=$gets->joined_by;
   AccountHistory::insert([
    'salesType' =>8,
    'incomeType' =>2,
    'shopId' =>$id,
    'customerId' =>$gets->joined_by,
    'created_at' => Carbon::now(),
    'balance' =>$incomeResponses->amount]);}
   if($gets->joined_by==NULL){
    $blanc=FlashSale::where('salesType', 2)
     ->Where('incomeType', 2)
     ->Where('salesType', 8)
     ->get('balance'); 
    foreach($blanc as $blcs){
    $totalResult=$blcs->balance+$balance;
       
    FlashSale::where('salesType', 8 )
   ->Where('incomeType', 2)
   ->update(['balance' => $totalResult,]);    
   }}
    /**End Direct Sale Sponsor*/ 
    /**Generation*/     
   $member =NewMemberEntry::where('upLine','!=',NULL)->where('downLine',$gets->joined_by)->get();
   $count =NewMemberEntry::where('upLine','!=',NULL)->where('downLine',$gets->joined_by)->count();            
   $distributeAmount=0;                              
   for( $i=1; $i<=$count; $i++ ){                
   $generation = Generation::where('generationStep', $i)->get();                    
   foreach($generation as $generations){
   $balance=$generations->generationAmount;   
   $memberr =NewMemberEntry::where('upLine','!=',NULL)->where('downLine',$gets->joined_by)->where('level',$i)->get();  
   foreach($memberr as $memberrs){ 
   $mem=$memberrs->upLine;                                                
   $bla=AccountInformation::where('customerId',$mem)                                                                                    ->where('salesType', 3)
   ->Where('incomeType', 2)
   ->Where('salesType', 9)
   ->get('balance'); 
   foreach($bla as $bl){
    $total=$bl->balance+$balance;
    }
    }                
    foreach($memberr as $memberrs){ 
    $mem=$memberrs->upLine;                                                
    AccountInformation::where('customerId',$mem)                                                                                    ->where('salesType', 3)
    ->Where('incomeType', 2)
    ->Where('salesType', 9)
    ->update(['balance' => $total]); 
    AccountHistory::insert([
      'salesType' =>9,
      'incomeType' =>2,
      'shopId' =>$id,
      'customerId' =>$mem,
      'created_at' => Carbon::now(),
      'balance' =>$balance]);
    }  
   }
   $distributeAmount +=$balance;
   }   
   /**End Generation*/ 
   /**Flash Sale Generation*/     
   $incomeFlashSale=Income::where('incomeTypeId',2)
   ->Where('id', 9)
    ->get();  
    foreach($incomeFlashSale as $incomeFlashSales){                  
    $balance=$incomeFlashSales->amount;
    if($distributeAmount< $balance){
     $totalBalance=$balance-$distributeAmount;
     $blan=FlashSale::where('salesType', 9)
     ->Where('incomeType', 2)
     ->Where('salesType', 9)
     ->get('balance'); 
    foreach($blan as $blc){
    $totalAmount=$blc->balance+$totalBalance;
    }
    FlashSale::Where('incomeType', 2)
    ->Where('salesType', 9)
    ->update(['balance' => $totalAmount]); 
     }
    }  
    /**End Flash Sale Generation*/ 
     /**Daily  Sale Royalty*/ 
     $designationCount= User::where('designation','!=', 1)->count();
     $incomeDailySaleRoyalty=Income::where('incomeTypeId',2)
     ->Where('id', 10)
     ->get('amount'); 
     foreach($incomeDailySaleRoyalty as $dailySale){
    if($designationCount!=0)  {   
     $totalDailySaleRoyalty=$dailySale->amount/$designationCount; 
    }
     }
     $userDesignation= User::where('designation','!=', 1)->get();      
     foreach($userDesignation as $userDesignations){
      $getPreviousAmountRoylty=AccountInformation::where('customerId',$userDesignations->id)
      ->Where('salesType', 10)
      ->Where('incomeType', 2)
      ->get();          
     foreach($getPreviousAmountRoylty as $getPreviousRoylts){                           
     $getPreviousRoyltyTotal=$getPreviousRoylts->balance+$totalDailySaleRoyalty;
     
    AccountInformation::where('customerId',$userDesignations->id)
    ->Where('salesType', 10 )
    ->Where('incomeType', 2)
    ->update(['balance' => $getPreviousRoyltyTotal]);
    AccountHistory::insert([
      'salesType' =>10,
      'incomeType' =>2,
      'shopId' =>$id,
      'customerId' =>$userDesignations->id,
      'created_at' => Carbon::now(),
      'balance' =>$totalDailySaleRoyalty]);
    }
}
     /**End Daily  Sale Royalty*/ 
     /**Daily  Sale Designation*/ 
     $countGetDesignation=Designation::where('designationId','!=',1)->count();
     $getDailySaleDesignation=Income::where('incomeTypeId',2)
     ->where('id', 11)
     ->get('amount'); 
     foreach($getDailySaleDesignation as $dailySaleDesignation){
     $calculate=$dailySaleDesignation->amount/$countGetDesignation;          
     }
     $getAllDesignation=Designation::where('designationId','!=',1)->get();
     $getAllDesignationCount=User::where('designation','!=',1)->count();
     $flashSaleDesignation=Income::where('incomeTypeId',2)
      ->where('id', 11)
     ->get('amount'); 
     foreach($flashSaleDesignation as $flashSaleDesignations){
    if($getAllDesignationCount!=0)  {       
     $calculateFlashSaleDesignation=$flashSaleDesignations->amount/ $getAllDesignationCount;  
     $calculateFlashSaleDesignationDaily=$flashSaleDesignations->amount-$calculateFlashSaleDesignation;      
     $balanceFlashSale=FlashSale::
     Where('salesType', 11)
     ->Where('incomeType', 2)
     ->get('balance'); 
    foreach($balanceFlashSale as $balanceFlashSales){
    $totalFlashSaleDesignation=$balanceFlashSales->balance+$calculateFlashSaleDesignationDaily;
    
    FlashSale:: Where('salesType', 11 )
    ->Where('incomeType', 2)
    ->update(['balance' => $totalFlashSaleDesignation]); 
       }  } 
     foreach($getAllDesignation as $alldesignations){
       $userDesignationCount=User::where('designation',$alldesignations->designationId)->count();
       if($userDesignationCount!=0){
       $lastAmount=$calculate/$userDesignationCount;   }
       
       $userDesignationDaily=User::where('designation',$alldesignations->designationId)->get();
      foreach($userDesignationDaily as $userDailyDesignations) {
        $amountDesignation=AccountInformation::where('customerId',$userDailyDesignations->id)
        ->Where('salesType', 11 )
        ->Where('incomeType', 2)
        ->get();          
       foreach($amountDesignation as $amountDesignations){                           
       $calculateAmount=$amountDesignations->balance+$lastAmount;           
      AccountInformation::where('customerId',$userDailyDesignations->id)
      ->Where('salesType', 11 )
      ->Where('incomeType', 2)
      ->update(['balance' =>  $calculateAmount]);
      AccountHistory::insert([
      'salesType' =>11,
      'incomeType' =>2,
      'shopId' =>$id,
      'customerId' =>$userDailyDesignations->id,
      'created_at' => Carbon::now(),
      'balance' =>$lastAmount]);
    
      }  
      }
     }}
     /**Daily  Sale Designation*/
     /**Daily Top 10 Saller*/
     $topTenCount=DesignationUserCondition::orderBy('sales' ,'DESC')->limit(10)->count();
     $topTenSaller=Income::where('incomeTypeId',2)
     ->where('id', 12)
     ->get('amount'); 
     foreach($topTenSaller as $topTenSallers){
     $calculateTopTen=$topTenSallers->amount/$topTenCount;
     }
     $topTen=DesignationUserCondition::orderby('sales','DESC')->limit(10)->get();
     foreach($topTen as $topTens){
      $getPreviousTopTen=AccountInformation::where('customerId',$topTens->id)
      ->Where('salesType', 12)
      ->Where('incomeType', 2)
      ->get();          
     foreach($getPreviousTopTen as $getPreviousTopTens){                           
     $getPreviousTopTenTotal=$getPreviousTopTens->balance+$calculateTopTen;
     
    AccountInformation::where('customerId',$topTens->id)
    ->Where('salesType', 12 )
    ->Where('incomeType', 2)
    ->update(['balance' => $getPreviousTopTenTotal]); 
    AccountHistory::insert([
      'salesType' =>12,
      'incomeType' =>2,
      'shopId' =>$id,
      'customerId' =>$topTens->id,
      'created_at' => Carbon::now(),
      'balance' => $calculateTopTen]);
     
     }}
     /**End Daily Top 10 Saller*/
    
 }
}
// /** Designation Update*/
// $take=NewShopEntry::where('shopId',$id)->count();
// $sumSale=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
// for($i=1;$i<=$take;$i++){
// foreach($sumSale as $sumSales) {
// $sumSaleTotal=$sumSales->sales+$i;    
// DesignationUserCondition::where('customerId',$shops->createdBy)->update([
// 'sales' => $sumSaleTotal]);
// }}
// $generationUser=NewMemberEntry::where('upLine',$shops->createdBy)->get();
// $downline=NewMemberEntry::where('downLine',$shops->createdBy)->get();    
// foreach($generationUser as $generationUsers){    
// $generation = User::where('id',$generationUsers->downLine)->get(); 
// foreach($generation as $user){
// $rt= NewShopEntry::where('shopId',$id)->count();
// for($x=1;$x<$rt;$x++){
// DesignationUserCondition::insert([
// 'customerId'=> $shops->createdBy, 
// 'teamSales' => 2]);}
// } 
// } 
// foreach($downline as $lines) {
// $geta = User::where('id',$lines->upLine)->get();   
// foreach($geta as $gt){
// $rrt= NewShopEntry::where('shopId',$id)->count();
// $sum=DesignationUserCondition::where('customerId',$gt->id)->get();
// for($y=1;$y<=$rrt;$y++){
// foreach($sum as $sums) {
// $sumTotal=$sums->teamSales+$y;  
// DesignationUserCondition::where('customerId',$gt->id)->update([      
// 'teamSales' => $sumTotal]);}
// }
// }
// }   
// /** Designation Update For Active Member*/
// $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',1)->count();
// $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
// $condition = DesignationCondition::where('designationId',2)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//    if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
//   User::where('id',$shops->createdBy)->update(
//         ['designation' => 2]
//     );  
//     }
//    }
//    }  
// $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
// foreach($down as $liness) {
// $gett = User::where('id',$liness->upLine)->get();
// foreach($gett as $gtt){ 
// $designationUser=User::where('joined_by',$gtt->id)->where('designation',1)->count();
// $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
// $condition = DesignationCondition::where('designationId',2)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//   if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
//  User::where('id',$gtt->id)->update(
//        ['designation' => 2]
//    );  
//    }
//   }
//   }
 
// }
// }
// /**End Designation Active Member*/
// /** Designation Update For Gold Member*/
// $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',2)->count();
// $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
// $condition = DesignationCondition::where('designationId',3)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//   if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
//  User::where('id',$shops->createdBy)->update(
//        ['designation' => 3]
//    );  
//    }
//   }
//   }  
// $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
// foreach($down as $liness) {
// $gett = User::where('id',$liness->upLine)->get();
// foreach($gett as $gtt){ 
// $designationUser=User::where('joined_by',$gtt->id)->where('designation',2)->count();
// $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
// $condition = DesignationCondition::where('designationId',3)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//  if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$gtt->id)->update(
//       ['designation' => 3]
//   );  
//   }
//  }
//  }    
// }
// }
// /** End Designation Update For Gold Member*/
// /** Designation Update For Sales Promotional Officer (SPO)*/
// $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',3)->count();
// $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
// $condition = DesignationCondition::where('designationId',4)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//   if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
//  User::where('id',$shops->createdBy)->update(
//        ['designation' => 4]
//    );  
//    }
//   }
//   }  
// $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
// foreach($down as $liness) {
// $gett = User::where('id',$liness->upLine)->get();
// foreach($gett as $gtt){ 
// $designationUser=User::where('joined_by',$gtt->id)->where('designation',3)->count();
// $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
// $condition = DesignationCondition::where('designationId',4)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//  if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$gtt->id)->update(
//       ['designation' => 4]
//   );  
//   }
//  }
//  }

// }
// }
// /** End Designation Update For Sales Promotional Officer (SPO)*/
// /** Designation Update For Regional Sales Manager(RSM)*/
// $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',4)->count();
// $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
// $condition = DesignationCondition::where('designationId',5)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//   if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
//  User::where('id',$shops->createdBy)->update(
//        ['designation' => 5]
//    );  
//    }
//   }
//   }  
// $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
// foreach($down as $liness) {
// $gett = User::where('id',$liness->upLine)->get();
// foreach($gett as $gtt){ 
// $designationUser=User::where('joined_by',$gtt->id)->where('designation',4)->count();
// $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
// $condition = DesignationCondition::where('designationId',5)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//  if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$gtt->id)->update(
//       ['designation' => 5]
//   );  
//   }
//  }
//  }

// }
// }
// /** End Designation Update For Regional Sales Manager(RSM)*/
// /** Designation Update For Assistant Sales Manager (ASM))*/
// $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',5)->count();
// $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
// $condition = DesignationCondition::where('designationId',6)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
//  if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$shops->createdBy)->update(
//       ['designation' => 6]
//   );  
//   }
//  }
//  }  
// $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
// foreach($down as $liness) {
// $gett = User::where('id',$liness->upLine)->get();
// foreach($gett as $gtt){ 
// $designationUser=User::where('joined_by',$gtt->id)->where('designation',5)->count();
// $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
// $condition = DesignationCondition::where('designationId',6)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
// if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$gtt->id)->update(
//      ['designation' => 6]
//  );  
//  }
// }
// }

// }
// }
// /** End Designation Update For Assistant Sales Manager (ASM)*/
// /** Designation Update For Assistant (General Manager Sales) AGM*/
// $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',6)->count();
// $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
// $condition = DesignationCondition::where('designationId',7)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
// if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$shops->createdBy)->update(
//      ['designation' => 7]
//  );  
//  }
// }
// }  
// $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
// foreach($down as $liness) {
// $gett = User::where('id',$liness->upLine)->get();
// foreach($gett as $gtt){ 
// $designationUser=User::where('joined_by',$gtt->id)->where('designation',6)->count();
// $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
// $condition = DesignationCondition::where('designationId',7)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
// if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$gtt->id)->update(
//     ['designation' => 7]
// );  
// }
// }
// }

// }
// }
// /** End Designation Update For Assistant (General Manager Sales) AGM*/
// /** Designation Update For Sales & Marketing(General Manager) SM*/
// $designationUser=User::where('joined_by',$shops->createdBy)->where('designation',7)->count();
// $userCondition=DesignationUserCondition::where('customerId',$shops->createdBy)->get();
// $condition = DesignationCondition::where('designationId',8)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
// if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$shops->createdBy)->update(
//     ['designation' => 8]
// );  
// }
// }
// }  
// $down=NewMemberEntry::where('downLine',$shops->createdBy)->get(); 
// foreach($down as $liness) {
// $gett = User::where('id',$liness->upLine)->get();
// foreach($gett as $gtt){ 
// $designationUser=User::where('joined_by',$gtt->id)->where('designation',7)->count();
// $userCondition=DesignationUserCondition::where('customerId',$gtt->id)->get();
// $condition = DesignationCondition::where('designationId',8)->get();
// foreach($condition as $conditions){  
// foreach($userCondition as $userConditions){    
// if($userConditions->sales>=$conditions->directSaleTarget&&$designationUser>=$conditions->memberTarget&&$userConditions->teamSales>=$conditions->teamSaleTarget){
// User::where('id',$gtt->id)->update(
//    ['designation' => 8]
// );  
// }
// }
// }

// }
// }
// /** End Designation Update For Sales & Marketing(General Manager) SM*/
}
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        //
    }
}
