import java.util.Random;

int boxsize = 100;
int cols, rows;
color[][] colors;


  
int hit = 0;
int miss = 0;
int lives = 15;

 

   Random rand = new Random();
   int a = rand.nextInt(6);
   int b = rand.nextInt(6);
   int c = rand.nextInt(6);
   int d = rand.nextInt(6);
   int e = rand.nextInt(6);
   int f = rand.nextInt(6);
   int g = rand.nextInt(6);
   int h = rand.nextInt(6);

   
 
void setup()
{
  
  size(600, 600);
  cols = width/boxsize;
  rows = height/boxsize;
  colors = new color[cols][rows];
  // to start them all white (by default they start 0 aka black)
 
  for (int i=0; i<cols; i++)
  {
    for (int j=0; j<rows; j++)
    {
      colors[i][j] = color(255); // set each to white
     
    }
   
  }
     colors[a][b] = color(255);
     colors[c][d] = color(255);
     colors[e][f] = color(255);
     colors[g][h] = color(255);
}
 
void draw()
{
  background(255);
 

  for (int i=0; i<rows; i++)
  {
   
   
    for (int j=0; j<cols; j++)
    {
       int x = i*boxsize;
       int y = j*boxsize;
     
      
      fill(colors[i][j]);
      rect(x, y, boxsize, boxsize);  
   }  
  }
        
      surface.setTitle("Battleships - Lives: " + lives + " - Hit: " + hit + " - Miss: " + miss);
      if(lives == 0)
      {
        exit();
      }
  }
  
  void mouseClicked()
  {
    if ((mouseX > (a*boxsize) && mouseX < ((a+1)*boxsize) && mouseY > (b*boxsize) && mouseY < ((b+1)*boxsize))  && colors[a][b] == color(255))
    {
        hit++;
        colors[a][b] = color(0);
      }
        
        else if((mouseX > (c*boxsize) && mouseX < ((c+1)*boxsize) && mouseY > (d*boxsize) && mouseY < ((d+1)*boxsize))  && colors[c][d] == color(255))
        {
         hit++;
         colors[c][d] = color(0);
         lives = lives + 3;
        } 
         
       else if((mouseX > (e*boxsize) && mouseX < ((e+1)*boxsize) && mouseY > (f*boxsize) && mouseY < ((f+1)*boxsize))  && colors[e][f] == color(255))
      {
         hit++;
         colors[e][f] = color(0);
         lives = lives + 3;
      } 
        
        else if((mouseX > (g*boxsize) && mouseX < ((g+1)*boxsize) && mouseY > (h*boxsize) && mouseY < ((h+1)*boxsize)) && colors[g][h] == color(255))
      {
          hit++;
          colors[g][h] = color(0);
          lives = lives + 3;
      }
      else
      {
        
        int x1 = (mouseX - mouseX%100)/100;
        int y1 = (mouseY - mouseY%100)/100;
         if(colors[x1][y1] == color(255))
         {
        colors[x1][y1]=color(125);
        miss++;
        lives--;
         }
      }
      /*else if((mouseX > (x) && mouseX < ((x+1)) && mouseY > (y) && mouseY < ((y+1))))
      {
        miss++;
        lives--;
      }*/
      
  }
   
    
    
  