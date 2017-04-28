CREATE TABLE Food (
	foodName      VARCHAR(64) NOT NULL
   ,foodState     VARCHAR(64) NOT NULL
   ,foodInfo      VARCHAR(64) NOT NULL
   ,foodImage     VARCHAR(64) NOT NULL
   ,storageInfo   VARCHAR(64) 
   ,storageImage  VARCHAR(64) 
   ,disposalInfo  VARCHAR(64)
   ,disposalImage VARCHAR(64)
   ,revivalInfo   VARCHAR(64)
   ,revivalImage  VARCHAR(64)
   ,CONSTRAINT pk_food
		PRIMARY KEY (foodName, foodState)
);

CREATE TABLE Recipes (
	foodName    VARCHAR(64) NOT NULL
   ,foodState   VARCHAR(64) NOT NULL
   ,recipeNo    CHAR(8)     NOT NULL
   ,recipe      VARCHAR(64) 
   ,recipeImage VARCHAR(64) 
   ,CONSTRAINT fk_recipes
		FOREIGN KEY (foodName, foodState)
		REFERENCES Food
   ,CONSTRAINT pk_recipes
		PRIMARY KEY (recipeNo)
);