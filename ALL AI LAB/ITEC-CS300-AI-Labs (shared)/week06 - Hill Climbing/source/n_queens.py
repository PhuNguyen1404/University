import random
import copy
import math

class NQueensStateNode:
    def __init__(self, initialState):
        self.state = initialState
        self.nQueen = len(initialState)
        self.cRow = dict()
        self.cDiagonal1 = dict()
        self.cDiagonal2 = dict()

    def printState(self):
        print(' '.join(str(r) for r in self.state))

    def countQueenList(self):
        self.cRow = dict()
        self.cDiagonal1 = dict()
        self.cDiagonal2 = dict()

        for col in range(self.nQueen):
            row = self.state[col]
            self.cRow[row] = self.cRow.get(row, 0) + 1
            self.cDiagonal1[row - col] = self.cDiagonal1.get(row - col, 0) + 1
            self.cDiagonal2[row + col] = self.cDiagonal2.get(row + col, 0) + 1

    def getHeuristic(self):
        self.countQueenList()
        heuristic = 0

        for count in self.cRow.values():
            heuristic += count * (count - 1) // 2

        for count in self.cDiagonal1.values():
            heuristic += count * (count - 1) // 2

        for count in self.cDiagonal2.values():
            heuristic += count * (count - 1) // 2

        return heuristic

    def getBestSuccessor(self):
        bestState = None
        bestHeuristic = math.inf

        for col in range(self.nQueen):
            for row in range(self.nQueen):
                if self.state[col] != row:
                    nextState = copy.deepcopy(self.state)
                    nextState[col] = row
                    nextStateNode = NQueensStateNode(nextState)
                    heuristic = nextStateNode.getHeuristic()
                    if heuristic < bestHeuristic:
                        bestState = nextState
                        bestHeuristic = heuristic

        return bestState

    def getFirstChoice(self):
        candidates = []
        currentHeuristic = self.getHeuristic()

        for col in range(self.nQueen):
            for row in range(self.nQueen):
                if self.state[col] != row:
                    nextState = copy.deepcopy(self.state)
                    nextState[col] = row
                    nextStateNode = NQueensStateNode(nextState)
                    heuristic = nextStateNode.getHeuristic()
                    if heuristic < currentHeuristic:
                        candidates.append(nextState)

        if candidates:
            return random.choice(candidates)
        else:
            return None

    @staticmethod
    def getRandomState(nQueen):
        state = list(range(nQueen))
        random.shuffle(state)
        return state

    @staticmethod
    def HillClimbing(state):
        currentStateNode = NQueensStateNode(state)
        currentHeuristic = currentStateNode.getHeuristic()

        print("Initial State:")
        currentStateNode.printState()
        print("Initial Heuristic:", currentHeuristic)

        while True:
            bestSuccessor = currentStateNode.getBestSuccessor()
            if bestSuccessor is None:
                break

            successorNode = NQueensStateNode(bestSuccessor)
            successorHeuristic = successorNode.getHeuristic()

            if successorHeuristic >= currentHeuristic:
                break

            currentStateNode = successorNode
            currentHeuristic = successorHeuristic

            print("Next State:")
            currentStateNode.printState()
            print("Heuristic:", currentHeuristic)

        return currentStateNode.state

    @staticmethod
    def HillClimbingFirstChoice(state):
        currentStateNode = NQueensStateNode(state)
        currentHeuristic = currentStateNode.getHeuristic()

        print("Initial State:")
        currentStateNode.printState()
        print("Initial Heuristic:", currentHeuristic)

        while True:
            bestSuccessor = currentStateNode.getFirstChoice()
            if bestSuccessor is None:
                break

            successorNode = NQueensStateNode(bestSuccessor)
            successorHeuristic = successorNode.getHeuristic()

            if successorHeuristic >= currentHeuristic:
                break

            currentStateNode = successorNode
            currentHeuristic = successorHeuristic

            print("Next State:")
            currentStateNode.printState()
            print("Heuristic:", currentHeuristic)

        return currentStateNode.state

    @staticmethod
    def HillClimbingRandomRestart(nQueen, maxRestarts):
        restarts = 0
        while restarts < maxRestarts:
            initialState = NQueensStateNode.getRandomState(nQueen)
            finalState = NQueensStateNode.HillClimbing(initialState)
            if NQueensStateNode(finalState).getHeuristic() == 0:
                return finalState
            restarts += 1
        return None

if __name__ == '__main__':
    finalState = NQueensStateNode.HillClimbing([2, 3, 0, 1])
    print("Final State:")
    NQueensStateNode(finalState).printState()

    initialState = NQueensStateNode.getRandomState(4)
    finalState = NQueensStateNode.HillClimbingFirstChoice(initialState)
    print("Final State:")
    NQueensStateNode(finalState).printState()

    finalState = NQueensStateNode.HillClimbingRandomRestart(8, 100)
    if finalState is not None:
        print("Final State:")
        NQueensStateNode(finalState).printState()
    else:
        print("No solution found within the given number of restarts.")
