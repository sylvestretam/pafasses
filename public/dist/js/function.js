function back(active,future)
{
    $(active).addClass('invisible');
    $(future).removeClass('invisible');
}

function getBudget(indicateur,mois)
{
    return JSON.parse(budgets).find(element=> element.indicateur == indicateur && element.mois == mois);
}

function edit(indicateur,mois)
{
    $('.cardedition').addClass('invisible');
    $('.edit').removeClass('invisible');

    let budget = getBudget(indicateur,mois);

    $('.indicateur').val(indicateur);
    $('.mois').val(mois);

    if( budget )
    {
        $('.budget').val(budget.budget);
        $('.realise').val(budget.realise);
        $('.budgetYTD').val(budget.budgetYTD);
        $('.realiseYTD').val(budget.realiseYTD);
        $('.commentaire').val(budget.commentaire);

        $('.subaction').val("mod");
    }
    else
    {
        $('.subaction').val("save");
    }
    
}

function showUser(userid)
{
    const user = getUser(userid);
    // alert(JSON.stringify(user));

    $('.nom').val(user.username);
    $('.email').val(user.useremail);
    // $('.nom').val(user.username);
    // $('.nom').val(user.username);

    back('.carduser','.edit');
}

function showDomaine(iddomaine)
{
    const domaine = getDomaine(iddomaine);

    $('.id').val(domaine.iddomaine);
    $('.description').val(domaine.description);

    back('.carddomaine','.edit');
}

function showService(idservice)
{
    const service = getService(idservice);

    $('.id').val(service.idservice);
    $('.description').val(service.description);

    back('.cardservice','.edit');
}

function showIndicateur(idindicateur)
{
    const indicateur = getIndicateur(idindicateur);
    
    $('.description').val(indicateur.description);
    $('.unite').val(indicateur.unite);
    $('.domaine').val(indicateur.domaine);
    $('.service').val(indicateur.service);
    $('.user').val(indicateur.responsable);


    back('.cardindicateur','.edit');
}

function showMois(idmois)
{
    const month = getMois(idmois);

    $('.idmois').val(idmois);
    if(month.status == "OUVERT")
    {
        $('.ouvert').attr('checked',true);
    }
    else
    {
        $('.fermer').attr('checked',true);
    }
    back('.cardcalendrier','.edit');
}




/**
 * 
 *  Les fonctions
 */

function getUser(userid)
{
    return (users).find(element=> element.userid == userid);
}

function getDomaine(iddomaine)
{
    return (domaines).find(element=> element.iddomaine == iddomaine);
}

function getService(idservice)
{
    return (services).find(element=> element.idservice == idservice);
}

function getIndicateur(idindicateur)
{
    return (indicateurs).find(element=> element.idindicateur == idindicateur);
}

function getMois(idmois)
{
    return (moiss).find(element=> element.idmois == idmois);
}