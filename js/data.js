'use strict';
jQuery("#data").jqGrid({ 
  url:'server.php?q=2', 
  datatype: "json", 
  colNames:['Id','Year', 'Ethnicity', 'Sex','Cause of Death','Count','Percent'], 
  colModel:[ 
            {name:'Id',index:'Id', width:55, editable:true, editoptions:{readonly:true}, sorttype:'int'}, 
            {name:'Year',index:'Year', width:90}, 
            {name:'Ethnicity',index:'Ethnicity', width:200,editable:true}, 
            {name:'Sex',index:'Sex', width:100, align:"center",editable:true}, 
            {name:'Cause_of_Death',index:'Cause_of_Death', width:400}, 
            {name:'Count',index:'Count', width:100,align:"center"}, 
            {name:'Percent',index:'Percent', width:100,  align:"center", sortable:false,} 
          ], 
  rowNum:15, 
  rowTotal: 50, 
  rowList:[10,20,30], 
  pager: '#pag', 
  sortname: 'Id', 
  loadonce: true, 
  viewrecords: true, 
  sortorder: "desc", 
  height: 400,
  //editurl: 'server.php', 
}); 

jQuery("#data").jqGrid('navGrid','#pag',{add:false, del:false, edit:false});