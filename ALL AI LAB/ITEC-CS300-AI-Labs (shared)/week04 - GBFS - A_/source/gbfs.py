from collections import defaultdict

# define graph
class Graph:

    # Constructor
    def __init__(self):
        # default dictionary to store graph
        self.graph = defaultdict(list)
        self.heuristic = []
        self.numVertices = 0
        self.numEdges = 0
        self.start = 0
        self.goal = 0

    # function to add an edge to graph
    def addEdge(self, u, v, l):
        self.graph[u].append((v, l))

    # read from file
    def readFromFile(self, filename):
        with open(filename, 'r') as f:
            self.numVertices, self.numEdges = [int(x) for x in next(f).split()]
            for i in range(self.numEdges):
                u, v, l = [int(x) for x in next(f).split()]
                self.addEdge(u, v, l)
            for i in range(self.numVertices):
                h = [int(x) for x in next(f).split()]
                self.heuristic.append(h)
            self.start, self.goal = [int(x) for x in next(f).split()]

    # function to be implemented
    def GBFS(self, s=0):
        ''' 
        TODO: function to implement
        '''
    

if __name__ == '__main__':
    g = Graph()
    g.readEdgesFromFile('input.txt')
    g.GBFS()
