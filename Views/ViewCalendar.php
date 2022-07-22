<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="Views/style/Calendar.css">
  </head>
<body>
  <nav class="mt-4 navbar navbar-dark bg-primary mb-3">
      <a href="Etudiant" class="navbar-brand">Dashboard</a>
  </nav>
  <?php 
  $month = new Calendar($_GET ['month']?? null, $_GET['year'] ?? null);
  $start= $month->getStartingDay();
  $start = $start->format('N') === '1' ? $start : $month->getStartingDay()->modify('last monday');
  ?>
  <div class="d-flex flex-row align-items-center justify-content-between mx-sm-3">
        <h1><?= $month->toString(); ?></h1>
        <div>
             <a href="calendar?month=<?= $month->previousMonth()->month; ?>&year=<?= $month->previousMonth()->year; ?>" class="btn btn-primary">&lt;</a>
            <a href="calendar?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="btn btn-primary">&gt;</a>
        </div>
    </div>

<table class="calendar__table calendar__table--<?= $month->getweeks(); ?>weeks ">
  <?php for ($i= 0; $i < $month->getweeks(); $i++): ?>
  <tr>
    <?php foreach($month->days as $k=> $day):
      $date=(clone $start)->modify( "+" .($k +$i *7 ) ."days") ?>
    <td class="<?= $month->withinMonth($date) ? '' : 'calendar__othermonth'; ?>">
      <?php if ($i ===0):?>
        <div class="calendar__weekday"><?= $day; ?></div>
      <?php endif ?>
        <div class="calendar__day"><?= $date->format('d');?></div>
    </td> 
    <?php endforeach ;?>
  </tr>
  <?php endfor ; ?> 
</table> 
</body> 
</html> 