<?

function dot_to_png($path)
{
  $stat = stat($path);
  $md5 = md5($path.$stat['mtime']);
  $fname = GRAPHDOT_CACHE_FPATH."/$md5.png";
  if (!file_exists($fname))
  {
    $cmd = "dot \"$path\" -Tpng > \"$fname\"";
    click_exec($cmd);
    if (!file_exists($fname)) click_error("Error creating PNG from DOT - $cmd.");
  }
  
  return GRAPHDOT_CACHE_VPATH."/$md5.png";
}